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
    if (isset($loggedUser)) {
      $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
    }
  }

  public function index()
  {
    if ($this->session->userdata('logged_type')) {
      redirect($this->session->userdata('logged_type'));
    }

    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $headerData['educationNum'] = $this->Education_model->getTotalNum();
    $headerData['tutorNum'] = $this->Tutor_model->getTotalNum();

    $data['totalStudentNum'] = $this->Student_model->getTotalNum();
    $data['todayStudentNum'] = $this->Student_model->getTodayNum();

    $returnVal = array();
    $results = $this->Education_model->getFifthData();
    foreach ($results as $result) {
      $result['address'] = $this->getSelectedName('tbl_location', $result['address']);
      $result['ratingHtml'] = $this->getAvgRating('education', $result['id']);

      $returnVal[] = $result;
    }
    $data['educations'] = $returnVal;

    $returnVal = array();
    $results = $this->Student_model->getFifthData();
    foreach ($results as $result) {
      $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
      $result['location'] = $this->getSelectedName('tbl_location', $result['location']);

      $returnVal[] = $result;
    }
    $data['students'] = $returnVal;

    $returnVal = array();
    $results = $this->Tutor_model->getFifthData();
    foreach ($results as $result) {
      $result['subject'] = $this->getSelectedName('tbl_subject', $result['subject']);
      $result['location'] = $this->getSelectedName('tbl_location', $result['location']);
      $result['ratingHtml'] = $this->getAvgRating('tutor', $result['id']);

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

    // $information = $this->loggedUserInfo;
    // $information['grade'] = $this->getSelectedName('tbl_grade', $information['grade']);
    // $information['subject'] = $this->getSelectedName('tbl_subject', $information['subject']);
    // $information['activity'] = $this->getSelectedName('tbl_activity_content', $information['activity']);

    $data['locations'] = $this->Common_model->getLocations();
    $data['grades'] = $this->Common_model->getAllGrades();
    $data['qualifications'] = $this->Common_model->getQualifications();
    $data['certifications'] = $this->Common_model->getCertification();
    $data['information'] = $this->loggedUserInfo;
    $data['type'] = $this->session->userdata('logged_type');

    $this->load->view('common/header', $headerData);
    $this->load->view('profile/' . $this->session->userdata('logged_type'), $data);
    $this->load->view('common/footer', array('type', $this->session->userdata('logged_type')));
  }

  public function editProfile()
  {
    $postedData = $this->input->post('formData');
    $id = $this->loggedUserInfo['id'];

    $userType = $this->session->userdata('logged_type');
    $result = $this->Common_model->updateUserInfo('tbl_' . $userType, $id, $postedData);

    if ($result) {
      $this->loggedUserInfo = $this->Common_model->getUserInfo('tbl_' . $userType, $id);
      $this->session->set_userdata('logged_user', $this->loggedUserInfo['name']);

      echo 'success';
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

  public function faqEducation()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('faq/education');
    $this->load->view('common/footer');
  }

  public function faqTutor()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('faq/tutor');
    $this->load->view('common/footer');
  }

  public function faqStudent()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('faq/student');
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

  public function howToWork()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('howToWork/index');
    $this->load->view('common/footer');
  }

  public function privatePolicy()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('privatePolicy/index');
    $this->load->view('common/footer');
  }

  public function personalInfoCollection()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');
    $headerData['avatar'] = $this->loggedUserInfo['avatar'];
    $headerData['userName'] = $this->loggedUserInfo['name'];

    $this->load->view('common/header', $headerData);
    $this->load->view('personalInfoCollection/index');
    $this->load->view('common/footer');
  }

  function getSelectedName($tableName, $ids)
  {
    $names = array();
    foreach ($this->Common_model->getSelectedName($tableName, $ids) as $nameArr) {
      array_push($names, $nameArr['name']);
    }

    return implode(', ', $names);
  }

  function getAvgRating($type, $id)
  {
    $rating = $this->Common_model->getAvgRating($type, $id);

    if (empty($rating)) {
      return '<p>No reviews yet</p>';
    }

    $str_rating = '<span class="badge badge-pill badge-secondary">' . $rating . '</span>';
    $cnt = round($rating - 0.1);

    for ($i = 0; $i < $cnt; $i++) {
      $str_rating .= '<span class="fa fa-star checked"></span>';
    }

    if ($rating > $cnt) {
      $cnt++;
      $str_rating .= '<span class="fa fa-star-half-o checked"></span>';
    }

    for ($i = 0; $i < (5 - $cnt); $i++) {
      $str_rating .= '<span class="fa fa-star-o checked"></span>';
    }

    return $str_rating;
  }

  function loginCheck()
  {
    if (!$this->session->userdata('logged_user')) {
      redirect('login');
    }
  }
}
