<?php


class Student extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Student_model');
        $this->load->model('Common_model');

        $loggedUser = $this->session->userdata('logged_user');
        if (isset($loggedUser))
        {
            $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
        }
    }

    public function index()
    {
        if (!$this->loginCheck())
        {
            redirect('login');
        }

        $headerData['loginStatus'] = $this->loginCheck()? "success": "fail";
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $data['qualifications'] = $this->Common_model->getQualifications();

        $this->load->view('common/header', $headerData);
        $this->load->view('student/index', $data);
        $this->load->view('common/footer');
    }

    public function detail($id)
    {
        if (!$this->loginCheck())
        {
            redirect('login');
        }

        $headerData['loginStatus'] = $this->loginCheck()? "success": "fail";
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $result = $this->Student_model->getPersonalInfo($id);
        $result['grade'] = $this->getSelectedName('tbl_grade', $result['grade']);
        $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
        $result['location'] = $this->getSelectedName('tbl_location', $result['location']);

        $data['information'] = $result;
        $data['curUserType'] = $this->session->userdata('logged_type');
        $data['id'] = $id;

        $footerData['num'] = $id;

        $this->load->view('common/header', $headerData);
        $this->load->view('student/detail', $data);
        $this->load->view('common/footer', $footerData);
    }

    public function getStudent()
    {
        $results = $this->Student_model->getStudent($this->input->post());

        $returnVal = array();
        foreach ($results as $result)
        {
            $result['grade'] = $this->getSelectedName('tbl_grade', $result['grade']);
            $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
            $result['location'] = $this->getSelectedName('tbl_location', $result['location']);

            $returnVal[] = $result;
        }

        echo json_encode($returnVal);
    }

    function getSelectedName($tableName, $ids)
    {
        $names = array();
        foreach($this->Common_model->getSelectedName( $tableName, $ids) as $nameArr)
        {
            array_push($names, $nameArr['name']);
        }

        return implode(', ', $names);
    }

    public function postMessage()
    {
        $result = $this->Common_model->getLoggedUserInfo();
        $userID = $result['id'];
        $userName = $this->session->userdata('logged_user');
        $userType = $this->session->userdata('logged_type');

        echo $this->Student_model->postMessage($userID, $userName, $userType, $this->input->post());
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