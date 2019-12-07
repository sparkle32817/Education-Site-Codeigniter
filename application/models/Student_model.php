<?php


class Student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register($postData)
    {
        $this->db->where('email', $postData['email']);
        $this->db->or_where('name', $postData['name']);
        if ($this->db->get('tbl_student')->num_rows() > 0)
        {
            return 'already';
        }

        $postData['password'] = md5($postData['password']);
        $postData['registered_date'] = date('Y-m-d H:i:s');
        if($this->db->insert('tbl_student', $postData))
        {
            return 'success';
        }

        return 'fail';
    }

    public function getFifthData()
    {
        return $this->db->order_by('id', 'DESC')->limit(5)->get('tbl_student')->result_array();
    }

    public function getStudent($postedData)
    {
        if ($postedData['total'] != 'all')
        {
            if (!empty($postedData['location']))
            {
                $this->db->where('location', $postedData['location']);
            }

            if (!empty($postedData['subject']))
            {
                $this->db->group_start();
                $this->db->like('subject', $postedData['subject'], 'none');
                $this->db->or_like('subject', ' '.$postedData['subject'].',', 'both');
                $this->db->or_like('subject', $postedData['subject'].',', 'after');
                $this->db->or_like('subject', ' '.$postedData['subject'], 'before');
                $this->db->group_end();
            }

            if (!empty($postedData['grade']))
            {
                $this->db->where('grade', $postedData['grade']);
            }
        }

//        $this->db->get('tbl_student');
//        return $this->db->last_query();

        return $this->db->get('tbl_student')->result_array();
    }

    public function getPersonalInfo($id)
    {
        return $this->db->where('id', $id)->get('tbl_student')->row_array();
    }

    public function getTodayNum()
    {
        $this->db->where('reg_date <=', date('Y-m-d 00:00:00'));
        $this->db->where('reg_date >=', date('Y-m-d 23:59:59'));
        return $this->db->get('tbl_student')->num_rows();
    }

    public function getTotalNum()
    {
        return $this->db->get('tbl_student')->num_rows();
    }

    public function postMessage($userID, $userName, $userType, $postedData)
    {
        $postedData['sender_id'] = $userID;
        $postedData['sender_type'] = $userType;
        $postedData['sender_name'] = $userName;
        $postedData['time'] = date('Y-m-d H:i:s');

        if ($this->db->insert('tbl_message', $postedData))
        {
            return 'success';
        }

        return 'fail';
    }
}