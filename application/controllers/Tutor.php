<?php


class Tutor extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Tutor_model');
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

        $data['subjects'] = $this->Common_model->getAllSubjects();
        $data['grades'] = $this->Common_model->getAllGrades();
        $data['locations'] = $this->Common_model->getLocations();

        $this->load->view('common/header', $headerData);
        $this->load->view('tutor/index', $data);
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

        $result = $this->Tutor_model->getPersonalInfo($id);
        $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
        $result['certification'] = $this->getSelectedName('tbl_certification', $result['certification']);
        $result['location'] = $this->getSelectedName('tbl_location', $result['location']);

        $data['information'] = $result;
        $data['curUserType'] = $this->session->userdata('logged_type');
        $data['offer_able'] = $this->checkCanOfferReview($id);
        $data['id'] = $id;

        $footerData['num'] = $id;

        $this->load->view('common/header', $headerData);
        $this->load->view('tutor/detail', $data);
        $this->load->view('common/footer', $footerData);
    }

    public function getTutor()
    {
        $results = $this->Tutor_model->getTutor($this->input->post());

        $returnVal = array();
        foreach ($results as $result)
        {
            $result['grade'] = $this->getSelectedName('tbl_grade', $result['grade']);
            $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
            $result['rating'] = $this->Common_model->getAvgRating('tutor', $result['id']);
            $result['jobs'] = $this->getJobCount('tutor', $result['id']);

            $returnVal[] = $result;
        }

        echo json_encode($returnVal);
    }

    public function getTutorFromOwnPage()
    {
        $results = $this->Tutor_model->getTutorFromTutorPage($this->input->post());

//        print_r($results); exit;

        $returnVal = array();
        foreach ($results as $result)
        {
            $result['grade'] = $this->getSelectedName('tbl_grade', $result['grade']);
            $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
            $result['location'] = $this->getSelectedName('tbl_location', $result['location']);
            $result['rating'] = $this->Common_model->getAvgRating('tutor', $result['id']);
            $result['jobs'] = $this->getJobCount('tutor', $result['id']);

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

    public function postReview()
    {
        $studentName = $this->session->userdata('logged_user');

        echo $this->Tutor_model->postReview($this->Common_model->getTableID('tbl_student', $studentName), $this->input->post());
    }

    public function getReview()
    {
        $results = $this->Tutor_model->getReview($this->input->post('tutor_id'));

//        echo json_encode($this->input->post());exit;

        $total_rating = 0;
        $returnVal = array();
        foreach ($results as $result)
        {
            $data = array();
            $data['name'] = $result['name'];
            $data['avatar'] = $result['avatar'];
            $data['time'] = $result['post_date'];
            $data['description'] = $result['description'];
            $data['rating'] = $result['rating'];

            $returnVal[] = $data;

            $total_rating += $result['rating'];
        }

        $avg_rating = sizeof($results)!=0? $this->makeComma($total_rating/sizeof($results)): 0;

        echo json_encode(array('avg_rating'=>$avg_rating, 'reviews'=>$returnVal));
    }

    function checkCanOfferReview($tutorID)
    {
        if ($this->session->userdata('logged_type') != 'student')
        {
            return false;
        }

        $studentName = $this->session->userdata('logged_user');

        return $this->Tutor_model->checkCanOfferReview($this->Common_model->getTableID('tbl_student', $studentName), $tutorID);
    }

    function getJobCount($type, $id)
    {
        $cnt = $this->Common_model->getJobCount($type, $id);

        if ($cnt == 1)
        {
            return '(' . $cnt . ' job completed)';
        }
        else if ($cnt > 1)
        {
            return '(' . $cnt . ' jobs completed)';
        }

        return '';
    }

    function makeComma($var)
    {
        return str_replace('.0', '', number_format($var, 1, '.', ''));
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