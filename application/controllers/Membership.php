<?php


class Membership extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('paypal_lib');

        $this->load->model('Common_model');
        $this->load->model('Membership_model');

        $loggedUser = $this->session->userdata('logged_user');
        if (isset($loggedUser))
        {
            $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
        }
    }

    //For Education Center
    public function payCenterForReg()
    {
        $this->payCenter('register');
    }

    public function payCenterForUpdate()
    {
        $this->payCenter('update');
    }

    function payCenter($status)
    {
        //for register
        $returnURL = base_url().'purchaseEMR'; //payment success url
        $cancelURL = base_url().'cancelEMR'; //payment cancel url
        if ($status == 'update')
        {
            //for update
            $returnURL = base_url().'purchaseEMU'; //payment success url
            $cancelURL = base_url().'cancelEMU'; //payment cancel url
        }
        $notifyURL = base_url().'paypal/ipn'; //ipn url
        //get particular product data
        $amount = $this->Membership_model->getEducationAmount();
        $logo = base_url().'assets/build/images/logo_4_1.png';

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Membership-Education");
        $this->paypal_lib->add_field('amount',  $amount);
        $this->paypal_lib->image($logo);

        $this->paypal_lib->paypal_auto_form();
    }

    //after success
    public function purCenterForReg()
    {
        $this->purchaseCenter('register');
    }

    public function purCenterForUpdate()
    {
        $this->purchaseCenter('update');
    }

    function purchaseCenter($status)
    {
        $id = $this->Common_model->getTableID('tbl_education', $this->session->userdata('registered_email'));
        $data = array(
            'membership_type' => 1,
            'membership_updated_date' => date('Y-m-d H:i:s')
        );

        if ($this->Membership_model->updateMembershipInfo('tbl_education', $id, $data))
        {
            $headerData['loggedUserType'] = $this->session->userdata('logged_type');
            $headerData['avatar'] = $this->loggedUserInfo['avatar'];
            $headerData['userName'] = $this->loggedUserInfo['name'];

            $this->load->view('common/header', $headerData);

            if ($status=='register')
            {
                $this->load->view('membership/registerCenter');
            }
            else //update
            {
                $this->load->view('membership/updateCenter');
            }

            $this->load->view('common/footer');
        }
    }

    public function cancelCenterForReg()
    {
        redirect('register/educationMembership');
    }

    public function cancelCenterForUpdate()
    {
        redirect('membership');
    }

    //For Tutor
    public function payTutorForReg($type)
    {
        $this->payTutor('register', $type);
    }

    public function payTutorForUpdate($type)
    {
        $this->payTutor('update', $type);
    }

    public function payTutor($status, $type)
    {
        $returnURL = base_url().'purchaseTMR/'.$type;
        $cancelURL = base_url().'cancelTMR';

        if ($status=='update')
        {
            $returnURL = base_url().'purchaseTMU/'.$type;
            $cancelURL = base_url().'cancelTMU';        //cancel
        }

        $notifyURL = base_url().'paypal/ipn';
        //get particular product data
        $amount = $this->Membership_model->getTutorAmount($type);
        $logo = base_url().'assets/build/images/logo_4_1.png';

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Membership-Tutor");
        $this->paypal_lib->add_field('amount',  $amount);
        $this->paypal_lib->image($logo);

        $this->paypal_lib->paypal_auto_form();
    }

    public function purTutorForReg($type)
    {
        $this->purchaseTutor('register', $type);
    }

    public function purTutorForUpdate($type)
    {
        $this->purchaseTutor('update', $type);
    }

    public function purchaseTutor($status, $type)
    {
        if ($status=='register')
        {
            $id = $this->Common_model->getTableID('tbl_tutor', $this->session->userdata('registered_email'));
        }
        else
        {
            $id = $this->Common_model->getTableID('tbl_tutor', $this->loggedUserInfo['email']);
        }

        $data = array(
            'membership_type' => $type,
            'membership_updated_date' => date('Y-m-d H:i:s')
        );

        if ($this->Membership_model->updateMembershipInfo('tbl_tutor', $id, $data))
        {
//            print_r($id); echo'***'; print_r($data);

            $headerData['loggedUserType'] = $this->session->userdata('logged_type');
            $headerData['avatar'] = $this->loggedUserInfo['avatar'];
            $headerData['userName'] = $this->loggedUserInfo['name'];

            $this->load->view('common/header', $headerData);

            if ($status=='register')
            {
                $this->load->view('membership/registerTutor');
            }
            else //update
            {
                $this->load->view('membership/updateTutor');
            }

            $this->load->view('common/footer');
        }
    }

    public function cancelTutorForReg()
    {
        redirect('register/tutorMembership');
    }

    public function cancelTutorForUpdate()
    {
        redirect('membership');
    }

}
