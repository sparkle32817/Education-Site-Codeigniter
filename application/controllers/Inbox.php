<?php


class Inbox extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Common_model');
        $this->load->model('Inbox_model');
        $this->load->model('Membership_model');

        $loggedUser = $this->session->userdata('logged_user');
        if (isset($loggedUser))
        {
            $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
        }
    }

    public function index()
    {
        $this->loginCheck();

        $user_type = $this->session->userdata('logged_type');
        $headerData['loggedUserType'] = $user_type;
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getUnreadCount($this->loggedUserInfo['id'], $user_type);
        $commonData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/index');
        $this->load->view('common/footer');
    }

    public function sent()
    {
        $this->loginCheck();

        $user_type = $this->session->userdata('logged_type');
        $headerData['loggedUserType'] = $user_type;
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getUnreadCount($this->loggedUserInfo['id'], $user_type);
        $commonData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/sent');
        $this->load->view('common/footer');
    }

    public function inboxDetail($id)
    {
      $this->detail($id, 'receiver');
    }

    public function sentDetail($id)
    {
      $this->detail($id, 'sender');
    }

    function detail($id, $status)
    {
      $this->loginCheck();

      $user_type = $this->session->userdata('logged_type');
      $headerData['loggedUserType'] = $user_type;
      $headerData['avatar'] = $this->loggedUserInfo['avatar'];
      $headerData['userName'] = $this->loggedUserInfo['name'];
      $commonData['inboxNum'] = $this->Inbox_model->getUnreadCount($this->loggedUserInfo['id'], $user_type);
      $commonData['userName'] = $this->loggedUserInfo['name'];

      $message = $this->Inbox_model->getDetailMessage($id);

      $tableName = 'tbl_'.($status=='receiver'? $message['sender_type']: $message['receiver_type']);
      $targetID = $status=='receive'? $message['sender_id']: $message['receiver_id'];

      $targetInfo = $this->Common_model->getUserInfo($tableName, $targetID);

      $data['information']['avatar'] = $targetInfo['avatar'];
      $data['information']['title'] = $message['title'];
      $data['information']['message'] = $message['message'];
      $data['information']['router'] = $status=='sender'? 'replySent': 'replyInbox';

      $data['information']['to'] = 'You';
      $data['information']['from'] = $targetInfo['name'];
      if ($status == 'sender')
      {
        $data['information']['to'] = $targetInfo['name'];
        $data['information']['from'] = 'You';
      }

      $data['information']['id'] = $id;

      $this->load->view('common/header', $headerData);
      $this->load->view('inbox/common', $commonData);
      $this->load->view('inbox/detail', $data);
      $this->load->view('common/footer');
    }

    public function replyInbox($id)
    {
      $this->reply($id, 'receiver');
    }

    public function replySent($id)
    {
      $this->reply($id, 'sender');
    }

    public function reply($id, $status)
    {
        $this->loginCheck();

        $user_type = $this->session->userdata('logged_type');
        $headerData['loggedUserType'] = $user_type;
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];

        $commonData['inboxNum'] = $this->Inbox_model->getUnreadCount($this->loggedUserInfo['id'], $user_type);
        $commonData['userName'] = $this->loggedUserInfo['name'];

        $message = $this->Inbox_model->getDetailMessage($id);

        $tableName = 'tbl_'.($status=='receive'? $message['sender_type']: $message['receiver_type']);
        $targetID = $status=='receiver'? $message['sender_id']: $message['receiver_id'];

        $targetInfo = $this->Common_model->getUserInfo($tableName, $targetID);

        $data['sender_type'] = $status=='receiver'? $message['sender_type']: $message['receiver_type'];
        $data['name'] = $targetInfo['name'];
        $data['type'] = $this->session->userdata('logged_type');
        $data['id'] = $id;

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/reply', $data);
        $this->load->view('common/footer', $data);
    }

    public function trash()
    {
        $this->loginCheck();

        $user_type = $this->session->userdata('logged_type');
        $headerData['loggedUserType'] = $user_type;
        $headerData['avatar'] = $this->loggedUserInfo['avatar'];
        $headerData['userName'] = $this->loggedUserInfo['name'];
        $commonData['inboxNum'] = $this->Inbox_model->getUnreadCount($this->loggedUserInfo['id'], $user_type);
        $commonData['userName'] = $this->loggedUserInfo['name'];

        $this->load->view('common/header', $headerData);
        $this->load->view('inbox/common', $commonData);
        $this->load->view('inbox/trash');
        $this->load->view('common/footer');
    }

    public function sendNew()
    {
        $userName = $this->session->userdata('logged_user');
        $userType = $this->session->userdata('logged_type');

        $membershipType = $this->Membership_model->checkMembership($userName, $userType);

        if ($membershipType == 0
            || ($userType == 'tutor'
                && $membershipType == 1
                && $this->Membership_model->getMessageCount($userName, $userType) >= 10)
        )
        {
            echo 'membership';
        }
        else
        {
            echo $this->Inbox_model->sendNew($this->loggedUserInfo['id'], $userType, $this->input->post('formData'));
        }

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

    public function markRead()
    {
        echo $this->Inbox_model->markRead($this->input->post('id'));
    }

    public function getInbox()
    {
        $results = $this->Inbox_model->getInbox($this->loggedUserInfo['id'], $this->session->userdata('logged_type'));

        $returnVal = array();
        foreach ($results as $result)
        {
            $nameArr = $this->Common_model->getSelectedName('tbl_'.$result['sender_type'], $result['sender_id']);

            $data = array();
            $data['id'] = $result['id'];
            $data['read_status'] = $result['read_status'];
            $data['sender'] = $nameArr[0]['name'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['created_at']));

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getSentMessage()
    {
        $results = $this->Inbox_model->getSentMessage($this->loggedUserInfo['id'], $this->session->userdata('logged_type'));

        $returnVal = array();
        foreach ($results as $result)
        {
            $nameArr = $this->Common_model->getSelectedName('tbl_'.$result['receiver_type'], $result['receiver_id']);

            $data = array();
            $data['id'] = $result['id'];
            $data['receiver'] = $nameArr[0]['name'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['created_at']));

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getTrashMessage()
    {
        $user_type = $this->session->userdata('logged_type');
        $results = $this->Inbox_model->getTrashMessage($this->loggedUserInfo['id'], $user_type);

        $returnVal = array();
        foreach ($results as $result)
        {
            $data = array();
            $data['id'] = $result['id'];
            $data['title'] = $result['title'];
            $data['date'] = date('M d', strtotime($result['created_at']));

            $data['router'] = $result['sender_type']==$user_type? 'sentDetail': 'inboxDetail';

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
