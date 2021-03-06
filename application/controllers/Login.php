<?php


class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('email');
    $this->load->model('Login_model');
    $this->load->model('Common_model');
  }

  public function index()
  {
    $this->session->sess_destroy();

    $headerData['loggedUserType'] = $this->session->userdata('logged_type');

    $this->load->view('common/header', $headerData);
    $this->load->view('home/login');
    $this->load->view('common/footer');
  }

  public function login()
  {
    $result = $this->Login_model->login($this->input->post('formData'));
    if ($result == "success") {
      $postedData = $this->input->post('formData');

      $this->session->set_userdata('logged_user', $postedData['name']);
      $this->session->set_userdata('logged_type', $postedData['type']);
    }

    echo $result;
  }

  public function recovery()
  {
    $headerData['loggedUserType'] = $this->session->userdata('logged_type');

    $this->load->view('common/header', $headerData);
    $this->load->view('home/forgotPassword');
    $this->load->view('common/footer');
  }

  public function recoveryPassword()
  {
    $postedData = $this->input->post('formData');
    if (!$this->Login_model->isValidEmail($postedData)) {
      echo "invalid";
      exit;
    }

    $password = $this->randomPassword();
    $result = $this->Login_model->resetPassword($postedData, $password);

    if ($this->Login_model->resetPassword($postedData, $password)) {
      $to = $postedData['email'];
      $message = '
                  <html>
                  <head>
                      <title>Recovery Password</title>
                  </head>
                  <body>
                      <h2>Please use new password</h2>
                      <h4>' . $password . '</h4>
                  </body>
                  </html>';

      $config = array(
        'mailtype' => 'html',
        'charset'  => 'utf-8',
        'priority' => '1'
      );
      $this->email->initialize($config);
      $this->email->from('education@noreply.education.com', 'Education-Website');
      $this->email->to($postedData['email']);
      $this->email->subject('Recovery Password');
      $this->email->message($message);
      if ($this->email->send()) {
        echo 'success';
        exit;
      }
    }

    echo 'fail';
  }

  function randomPassword()
  {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('home');
  }
}
