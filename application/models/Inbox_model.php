<?php


class Inbox_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function sendNew($senderID, $senderName, $senderType, $postedData)
    {
        $result = $this->db->where('name', $postedData['receiver'])->get('tbl_'.$postedData['type'])->row_array();

        if (sizeof($result) > 0)
        {
            $arr = array('sender_id'=>$senderID, 'sender_name'=>$senderName, 'sender_type'=>$senderType,
                        'receiver_id'=>$result['id'], 'receiver_name'=>$result['name'], 'receiver_type'=>$postedData['type'],
                        'title'=>$postedData['title'], 'message'=>$postedData['message'], 'time'=>date('Y-m-d H:i:s'));

            if ($this->db->insert('tbl_message', $arr))
            {
                return 'success';
            }

            return 'fail';
        }

        return 'no-user';
    }

    public function getInbox($receiverID)
    {
        return $this->db->where(array('receiver_id'=>$receiverID, 'status'=>1))->get('tbl_message')->result_array();
    }

    public function getInboxCount($receiverID)
    {
        return $this->db->where(array('receiver_id'=>$receiverID, 'status'=>1))->get('tbl_message')->num_rows();
    }

    public function getSentMessage($senderID)
    {
        return $this->db->where(array('sender_id'=>$senderID, 'status'=>1))->get('tbl_message')->result_array();
    }

    public function getTrashMessage($userID)
    {
        $this->db->group_start();
        $this->db->where('sender_id', $userID);
        $this->db->or_where('receiver_id', $userID);
        $this->db->group_end();
        $this->db->where('status', 0);
        return $this->db->get('tbl_message')->result_array();
    }

    public function getDetailMessage($id)
    {
        $result = $this->db->where('id', $id)->get('tbl_message')->row_array();
        return $this->db->select('a.title, b.avatar, b.name, b.email, a.message')
                    ->from('tbl_message a')
                    ->join('tbl_'.$result['sender_type'].' b', 'a.sender_id=b.id')
                    ->get()
                    ->row_array();
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
            $this->db->delete('tbl_message');
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
}
