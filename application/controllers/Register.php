<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('paypal_lib');

        $this->load->model('Education_model');
        $this->load->model('Tutor_model');
        $this->load->model('Student_model');
        $this->load->model('Common_model');
        $this->load->model('Membership_model');
    }

    public function education()
    {
        $headerData['loginStatus'] = "fail";

        $data['activities'] = array();
        $data['subjects'] = $this->Common_model->getAllSubjects();
        $data['grades'] = $this->Common_model->getAllGrades();

        $this->load->view('common/header', $headerData);
        $this->load->view('register/education', $data);
        $this->load->view('common/footer');
    }

    public function registerEducation()
    {
        $postedData = $this->input->post('formData');
        
        $result = $this->Education_model->register($postedData);

        if ($result == 'success')
        {
            $this->session->set_userdata('registered_type', 'education');
            $this->session->set_userdata('registered_email', $postedData['email']);
        }

        echo $result;
    }

    public function educationMembership()
    {
        $headerData['loginStatus'] = "fail";

        if ($this->session->userdata('registered_type') != 'education')
        {
            redirect('home');
        }

        $this->load->view('common/header', $headerData);
        $this->load->view('register/educationMembership');
        $this->load->view('common/footer');
    }

    public function educationPay()
    {
        //Set variables for paypal form
        $returnURL = base_url().'register/purchaseEducationMembership/1'; //payment success url
        $cancelURL = base_url().'educationMembership'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
        //get particular product data
        $amount = $this->Membership_model->getEducationAmount();
        $logo = base_url().'assets/build/images/logo_4_1.png';


        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Membership");
//        $this->paypal_lib->add_field('custom', $userID);
//        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $amount);
        $this->paypal_lib->image($logo);

        $this->paypal_lib->paypal_auto_form();
    }

    public function purchaseEducationMembership($type)
    {
        $id = $this->Common_model->getTableID($this->session->userdata('registered_email'));
        $data = array(
            'membership_type' => $type,
            'membership_updated_date' => date('Y-m-d H:i:s')
        );

        $this->Common_model->updateMembershipInfo('tbl_education', $id, $data);
    }

    public function tutor()
    {
        $headerData['loginStatus'] = "fail";

        $data['activities'] = array();
        $data['subjects'] = $this->Common_model->getAllSubjects();
        $data['grades'] = $this->Common_model->getAllGrades();
        $data['locations'] = $this->Common_model->getLocations();
        $data['qualifications'] = $this->Common_model->getQualifications();
        $data['certifications'] = $this->Common_model->getCertification();

        $this->load->view('common/header', $headerData);
        $this->load->view('register/tutor', $data);
        $this->load->view('common/footer');
    }

    public function registerTutor()
    {
        $postedData = $this->input->post('formData');
        $result = $this->Tutor_model->register($postedData);

        if ($result == 'success')
        {
            $this->session->set_userdata('registered_type', 'tutor');
        }

        echo $result;
    }

    public function tutorMembership()
    {
        $headerData['loginStatus'] = "fail";

        if ($this->session->userdata('registered_type') != 'tutor')
        {
            redirect('home');
        }

        $this->load->view('common/header', $headerData);
        $this->load->view('register/tutorMembership');
        $this->load->view('common/footer');
    }

    public function tutorPay($type)
    {
        //Set variables for paypal form
        $returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
        //get particular product data
        $product = $this->product->getRows($id);
        $userID = 1; //current user id
        $logo = base_url().'assets/images/codexworld-logo.png';


        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $product['price']);
        $this->paypal_lib->image($logo);

        $this->paypal_lib->paypal_auto_form();
    }

    public function student()
    {
        $headerData['loginStatus'] = $this->loginCheck()? "success": "fail";

        $data['activities'] = array();
        $data['subjects'] = $this->Common_model->getAllSubjects();
        $data['grades'] = $this->Common_model->getAllGrades();
        $data['locations'] = $this->Common_model->getLocations();

        $this->load->view('common/header', $headerData);
        $this->load->view('register/student', $data);
        $this->load->view('common/footer');
    }

    public function registerStudent()
    {
        echo $this->Student_model->register($this->input->post('formData'));
    }

    public function getSubjects()
    {
        $postedData = $this->input->post();

        if (empty($postedData["ids"]))
        {
            echo json_encode(array());
            exit;
        }

        $results = $this->Common_model->getGrades($postedData["ids"]);

        $returnVal = array();
        foreach ($results as $result) {

            $subjects = $this->Common_model->getSubjects($result['id']);

            $data = array();
            $data['text'] = $result['name'];
            foreach ($subjects as $subject)
            {
                $data['children'][] = array('id'=>$subject['id'], 'text'=>$subject['name']);
            }

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getActivities()
    {
        $results = $this->Common_model->getActivityTitle();

        $returnVal = array();
        foreach ($results as $result) {

            $subjects = $this->Common_model->getActivities($result['id']);

            $data = array();
            $data['text'] = $result['name'];
            foreach ($subjects as $subject)
            {
                $data['children'][] = array('id'=>$subject['id'], 'text'=>$subject['name']);
            }

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    function loginCheck()
    {
        if ($this->session->userdata('logged_user'))
        {
            return true;
        }

        return false;
    }
}
