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
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

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
        
        $result = $this->Common_model->register('tbl_education', $postedData);

        if ($result == 'success')
        {
            $this->session->set_userdata('registered_type', 'education');
            $this->session->set_userdata('registered_email', $postedData['email']);
        }

        echo $result;
    }

    public function educationMembership()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

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
        $returnURL = base_url().'purchaseEducationMembership'; //payment success url
        $cancelURL = base_url().'educationMembership'; //payment cancel url
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

    public function purchaseEducationMembership()
    {
        $id = $this->Common_model->getTableID('tbl_education', $this->session->userdata('registered_email'));
        $data = array(
            'membership_type' => 1,
            'membership_updated_date' => date('Y-m-d H:i:s')
        );

        if ($this->Common_model->updateMembershipInfo('tbl_education', $id, $data))
        {
            $headerData['loggedUserType'] = $this->session->userdata('logged_type');

            $this->load->view('common/header', $headerData);
            $this->load->view('register/purchaseEducationMembership');
            $this->load->view('common/footer');
        }
    }

    public function tutor()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

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

        $result = $this->Common_model->register('tbl_tutor', $postedData);

        if ($result == 'success')
        {
            $this->session->set_userdata('registered_type', 'tutor');
            $this->session->set_userdata('registered_email', $postedData['email']);
        }

        echo $result;
    }

    public function tutorMembership()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

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
        $returnURL = base_url().'register/purchaseTutorMembership/1';
        $cancelURL = base_url().'tutorMembership';
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

    public function purchaseTutorMembership($type)
    {
        $id = $this->Common_model->getTableID('tbl_tutor', $this->session->userdata('registered_email'));
        $data = array(
            'membership_type' => $type,
            'membership_updated_date' => date('Y-m-d H:i:s')
        );

        if ($this->Common_model->updateMembershipInfo('tbl_tutor', $id, $data))
        {
            $headerData['loggedUserType'] = $this->session->userdata('logged_type');

            $this->load->view('common/header', $headerData);
            $this->load->view('register/purchaseTutorMembership');
            $this->load->view('common/footer');
        }
    }

    public function student()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

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
        echo $this->Common_model->register('tbl_student', $this->input->post('formData'));
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

}
