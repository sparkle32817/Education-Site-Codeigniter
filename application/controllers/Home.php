<?php


class Home extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Education_model');
        $this->load->model('Student_model');
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
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $headerData['educationNum'] = $this->Education_model->getTotalNum();
        $headerData['tutorNum'] = $this->Tutor_model->getTotalNum();

        $data['totalStudentNum'] = $this->Student_model->getTotalNum();
        $data['todayStudentNum'] = $this->Student_model->getTodayNum();

        $returnVal = array();
        $results = $this->Education_model->getFifthData();
        foreach ($results as $result)
        {
            $result['ratingHtml'] = $this->getAvgRating('education', $result['id']);
            $result['jobs'] = $this->getJobCount('education', $result['id']);

            $returnVal[] = $result;
        }
        $data['educations'] = $returnVal;

        $returnVal = array();
        $results = $this->Student_model->getFifthData();
        foreach ($results as $result)
        {
            $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
            $result['location'] = $this->getSelectedName('tbl_location', $result['location']);

            $returnVal[] = $result;
        }
        $data['students'] = $returnVal;

        $returnVal = array();
        $results = $this->Tutor_model->getFifthData();
        foreach ($results as $result)
        {
            $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
            $result['location'] = $this->getSelectedName('tbl_location', $result['location']);
            $result['ratingHtml'] = $this->getAvgRating('tutor', $result['id']);
            $result['jobs'] = $this->getJobCount('tutor', $result['id']);

            $returnVal[] = $result;
        }
        $data['tutors'] = $returnVal;

        $this->load->view('common/header1', $headerData);
        $this->load->view('home/index', $data);
        $this->load->view('common/footer');
    }

    public function profile()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $information = $this->loggedUserInfo;
        $information['grade'] = $this->getSelectedName('tbl_grade', $information['grade']);
        $information['subject'] = $this->getSelectedName('tbl_subject', $information['subject']);
        $information['activity'] = $this->getSelectedName('tbl_activity_content', $information['activity']);

//        if ($type != 'student' && isset($information['location']))
//        {
//            $information['location'] = $this->getSelectedName('tbl_location', $information['location']);
//        }
//        if (isset($information['certification']))
//        {
//            $information['certification'] = $this->getSelectedName('tbl_certification', $information['certification']);
//        }
//        if (isset($information['qualification']))
//        {
//            $information['qualification'] = $this->getSelectedName('tbl_qualification', $information['qualification']);
//        }

        $data['locations'] = $this->Common_model->getLocations();
        $data['qualifications'] = $this->Common_model->getQualifications();
        $data['certifications'] = $this->Common_model->getCertification();
        $data['information'] = $information;
        $data['type'] = $this->session->userdata('logged_type');

        $this->load->view('common/header', $headerData);
        $this->load->view('home/profile', $data);
        $this->load->view('common/footer');
    }

    public function editProfile()
    {
        $postedData = $this->input->post('formData');

        $userType = $this->session->userdata('logged_type');
        $result = $this->Common_model->updateUserInfo('tbl_'.$userType, $this->loggedUserInfo['id'], $postedData);

        if (gettype($result)=="array")
        {
            $this->loggedUserInfo = $result;

            echo 'success';
        }
        else
        {
            print_r($result);
        }
    }

    public function membership()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $data['membership_type'] = $this->loggedUserInfo['membership_type'];
        $data['loggedUserType'] = $this->session->userdata('logged_type');

        $this->load->view('common/header', $headerData);
        $this->load->view('home/membership', $data);
        $this->load->view('common/footer');
    }

    public function faq()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('faq/index');
        $this->load->view('common/footer');
    }

    public function aboutUs()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('aboutus/index');
        $this->load->view('common/footer');
    }

    public function contactUs()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('contactus/index');
        $this->load->view('common/footer');
    }

    public function terms()
    {
        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('termsCondition/index');
        $this->load->view('common/footer');
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

    function getAvgRating($type, $id)
    {
        $rating = $this->Common_model->getAvgRating($type, $id);

        if (empty($rating))
        {
            return '<p>No reviews yet</p>';
        }

        $str_rating = '<span class="badge badge-pill badge-secondary">'.$rating.'</span>';
        $cnt = round($rating - 0.1);

        for ($i = 0; $i < $cnt; $i++){
            $str_rating .= '<span class="fa fa-star checked"></span>';
        }

        if ($rating>$cnt)
        {
            $cnt ++;
            $str_rating .= '<span class="fa fa-star-half-o checked"></span>';
        }

        for ($i=0; $i<(5-$cnt); $i++) {
            $str_rating .= '<span class="fa fa-star-o checked"></span>';
        }

        return $str_rating;
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

    function loginCheck()
    {
        if (!$this->session->userdata('logged_user'))
        {
            redirect('login');
        }
    }

}
