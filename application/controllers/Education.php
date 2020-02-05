<?php


class Education extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Education_model');
        $this->load->model('Common_model');

        $loggedUser = $this->session->userdata('logged_user');
        if (isset($loggedUser))
        {
            $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
        }
    }

    public function index()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $data['userName'] = $this->loggedUserInfo['name'];
        $data['qualifications'] = $this->Common_model->getQualifications();
        $data['subjects'] = $this->Common_model->getAllSubjects();
        $data['grades'] = $this->Common_model->getAllGrades();
        $data['locations'] = $this->Common_model->getLocations();

        $this->load->view('common/header', $headerData);
        $this->load->view('education/index', $data);
        $this->load->view('common/footer');
    }

    public function detail($id)
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $result = $this->Education_model->getPersonalInfo($id);

        $data['information'] = $result;
        $data['curUserType'] = $this->session->userdata('logged_type');
        $data['offer_able'] = $this->canOfferReview($id);
        $data['id'] = $id;

        $footerData['num'] = $id;

        $this->load->view('common/header', $headerData);
        $this->load->view('education/detail', $data);
        $this->load->view('common/footer', $footerData);
    }

    public function getEducation()
    {
        $results = $this->Education_model->getAllEducation($this->input->post());

        $returnVal = array();
        foreach ($results as $result)
        {
            $result['rating'] = $this->Common_model->getAvgRating('education', $result['id']);

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

        echo $this->Education_model->postReview($this->Common_model->getTableID('tbl_student', $studentName), $this->input->post());
    }

    public function getReview()
    {
        $results = $this->Education_model->getReview($this->input->post('education_id'));

//        echo json_encode($this->input->post());exit;

        $total_rating = 0;
        $returnVal = array();
        foreach ($results as $result)
        {
            $data = array();
          $data['name'] = substr($result['name'], 0, 3).'xxx';
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

    function canOfferReview($education_id)
    {
        if ($this->session->userdata('logged_type') != 'student')
        {
            return false;
        }

        $studentName = $this->session->userdata('logged_user');

        return $this->Education_model->canOfferReview($this->Common_model->getTableID('tbl_student', $studentName), $education_id);
    }

    function makeComma($var)
    {
        return str_replace('.0', '', number_format($var, 1, '.', ''));
    }

    function loginCheck()
    {
        if (!$this->session->userdata('logged_user'))
        {
            redirect('login');
        }
    }

}
