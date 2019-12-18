<?php


class Inbox extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Common_model');
        $this->load->model('Inbox_model');

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
        $commonData['inboxNum'] = $this->Inbox_model->getInboxCount($this->loggedUserInfo['id']);

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/index');
        $this->load->view('common/footer');
    }

    public function sent()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getInboxCount($this->loggedUserInfo['id']);

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/sent');
        $this->load->view('common/footer');
    }

    public function detail($id)
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getInboxCount($this->loggedUserInfo['id']);
        $data['information'] = $this->Inbox_model->getDetailMessage($id);

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/detail', $data);
        $this->load->view('common/footer');
    }

    public function trash()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getInboxCount($this->loggedUserInfo['id']);

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/trash');
        $this->load->view('common/footer');
    }

    public function newMessage()
    {
        $this->loginCheck();

        $headerData['loggedUserType'] = $this->session->userdata('logged_type');
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getInboxCount($this->loggedUserInfo['id']);
        $data['type'] = $this->session->userdata('logged_type');

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/new', $data);
        $this->load->view('common/footer');
    }

    public function sendNew()
    {
        $userName = $this->session->userdata('logged_user');
        $userType = $this->session->userdata('logged_type');

        echo $this->Inbox_model->sendNew($this->loggedUserInfo['id'], $userName, $userType, $this->input->post('formData'));
    }

    public function sendToTrash()
    {
        echo $this->Inbox_model->sendToTrash($this->input->post('ids'));
    }

    public function restoreMessage()
    {
        echo $this->Inbox_model->restoreMessage($this->input->post('ids'));
    }

    public function deleteMessage()
    {
        echo $this->Inbox_model->deleteMessage($this->input->post('ids'));
    }

    public function markAllRead()
    {
        echo $this->Inbox_model->markAllRead();
    }

    public function getInbox()
    {
        $results = $this->Inbox_model->getInbox($this->loggedUserInfo['id']);

        $returnVal = array();
        foreach ($results as $result)
        {
            $nameArr = $this->Common_model->getSelectedName('tbl_'.$result['sender_type'], $result['sender_id']);

            $data = array();
            $data['id'] = $result['id'];
            $data['read_status'] = $result['read_status'];
            $data['sender'] = $nameArr[0]['name'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['time']));

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getSentMessage()
    {
        $results = $this->Inbox_model->getSentMessage($this->loggedUserInfo['id']);

        $returnVal = array();
        foreach ($results as $result)
        {
            $nameArr = $this->Common_model->getSelectedName('tbl_'.$result['receiver_type'], $result['receiver_id']);

            $data = array();
            $data['id'] = $result['id'];
            $data['receiver'] = $nameArr[0]['name'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['time']));

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getTrashMessage()
    {
        $results = $this->Inbox_model->getTrashMessage($this->loggedUserInfo['id']);

        $returnVal = array();
        foreach ($results as $result)
        {
            $data = array();
            $data['id'] = $result['id'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['time']));

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    function loginCheck()
    {
        if (!$this->session->userdata('logged_user'))
        {
            redirect('login');
        }
    }

}
