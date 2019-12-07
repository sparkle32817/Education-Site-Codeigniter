<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
    }

    public function index()
    {
        $headerData['loginStatus'] = "fail";
        $this->load->view('common/header', $headerData);
        $this->load->view('home/login');
        $this->load->view('common/footer');
    }

    public function login()
    {
        $result = $this->Login_model->login($this->input->post('formData'));
        if ($result=="success")
        {
            $postedData = $this->input->post('formData');

            $this->session->set_userdata('logged_user', $postedData['name']);
            $this->session->set_userdata('logged_type', $postedData['type']);
        }

        echo $result;
    }

    public function recovery()
    {
        $headerData['loginStatus'] = "fail";

        $this->load->view('common/header', $headerData);
        $this->load->view('home/forgotPassword');
        $this->load->view('common/footer');
    }

    public function recoveryPassword()
    {
        echo "success";
    }

    function loginCheck()
    {
        if ($this->session->userdata('logged_user'))
        {
            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

}
