<?php


class Inbox_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function sendNew($senderID, $senderType, $postedData)
    {
        $result = $this->db->where('name', $postedData['receiver'])->get('tbl_'.$postedData['type'])->row_array();

        if (sizeof($result) > 0)
        {
            $arr = array('sender_id'=>$senderID, 'sender_type'=>$senderType,
                        'receiver_id'=>$result['id'], 'receiver_type'=>$postedData['type'],
                        'title'=>$postedData['title'], 'message'=>$postedData['message'], 'created_at'=>date('Y-m-d H:i:s'));

            if ($this->db->insert('tbl_message', $arr))
            {
                return 'success';
            }

            return 'fail';
        }

        return 'no-user';
    }

    public function getInbox($receiverID, $receiverType)
    {
        return $this->db->where(array('receiver_id'=>$receiverID, 'receiver_type'=>$receiverType, 'status'=>1))->get('tbl_message')->result_array();
    }

    public function getUnreadCount($receiverID, $receiverType)
    {
        return $this->db->where(array('receiver_id'=>$receiverID, 'receiver_type'=>$receiverType, 'read_status'=>0))->get('tbl_message')->num_rows();
    }

    public function getSentMessage($senderID, $senderType)
    {
        return $this->db->where(array('sender_id'=>$senderID, 'sender_type'=>$senderType, 'status'=>1))->get('tbl_message')->result_array();
    }

    public function getTrashMessage($userID, $userType)
    {
        $this->db->group_start();
          $this->db->group_start();
            $this->db->where('sender_id', $userID);
            $this->db->where('sender_type', $userType);
          $this->db->group_end();
          $this->db->or_group_start();
            $this->db->where('receiver_id', $userID);
            $this->db->where('receiver_type', $userType);
          $this->db->group_end();
        $this->db->group_end();
        $this->db->where('status', 0);
        $this->db->group_start();
        $this->db->where('deleted_at', NULL);
        $this->db->or_where('deleted_at', '0000-00-00 00:00:00');
        $this->db->group_end();
        return $this->db->get('tbl_message')->result_array();
    }

    public function getDetailMessage($id)
    {
        return $this->db->where('id', $id)->get('tbl_message')->row_array();
    }

    public function sendToTrash($ids)
    {
        foreach ($ids as $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tbl_message', array('status'=>0));
        }

        return 'success';
    }

    public function restoreMessage($ids)
    {
        foreach ($ids as $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tbl_message', array('status'=>1));
        }

        return 'success';
    }

    public function deleteMessage($ids)
    {
        foreach ($ids as $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tbl_message', array('deleted_at'=>date('Y-m-d H:i:s')));
        }

        return 'success';
    }

    public function markAllRead()
    {
        $this->db->where('read_status', 0);
        if ($this->db->update('tbl_message', array('read_status'=>1)))
        {
            return 'success';
        }

        return 'fail';
    }

    public function markRead($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_message', array('read_status'=>1)))
        {
            return 'success';
        }

        return 'fail';
    }
}
