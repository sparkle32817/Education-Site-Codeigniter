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
        $data['locations'] = $this->Common_model->getLocations();

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

    public function student()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');

        $grades = $this->Common_model->getAllGrades();
        $data['activities'] = array();
        $data['subjects'] = empty($grades)? array(): $this->Common_model->getSubjects($grades[0]['id']);
        $data['grades'] = $grades;
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

        $subjects = $this->Common_model->getSubjects($postedData["ids"]);

        $data = array();
        foreach ($subjects as $subject)
        {
            $data[] = array('id'=>$subject['id'], 'text'=>$subject['name']);
        }

        echo json_encode($data);
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
