<?php


class Student_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getFifthData()
  {
    return $this->db->select('id, name, avatar, subject, location')
      ->order_by('id', 'DESC')
      ->limit(5)
      ->get('tbl_student')
      ->result_array();
  }

  public function getStudent($postedData)
  {
    $this->db->select('id, name, location, grade, subject, avatar');
    if (!empty($postedData['location'])) {
      $this->db->where('location', $postedData['location']);
    }

    if (!empty($postedData['subject'])) {
      $this->db->group_start();
      $this->db->like('subject', $postedData['subject'], 'none');
      $this->db->or_like('subject', $postedData['subject'] . ',', 'both');
      $this->db->or_like('subject', $postedData['subject'] . ',', 'after');
      $this->db->or_like('subject', $postedData['subject'], 'before');
      $this->db->group_end();
    }

    if (!empty($postedData['grade'])) {
      $this->db->group_start();
      $this->db->like('grade', $postedData['grade'], 'none');
      $this->db->or_like('grade', $postedData['grade'] . ',', 'both');
      $this->db->or_like('grade', $postedData['grade'] . ',', 'after');
      $this->db->or_like('grade', $postedData['grade'], 'before');
      $this->db->group_end();
    }

    return $this->db->get('tbl_student')->result_array();
  }

  public function getPersonalInfo($id)
  {
    return $this->db->where('id', $id)->get('tbl_student')->row_array();
  }

  public function getTodayNum()
  {
    $this->db->where('registered_date <=', date('Y-m-d 00:00:00'));
    $this->db->where('registered_date >=', date('Y-m-d 23:59:59'));
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

    if ($this->db->insert('tbl_message', $postedData)) {
      return 'success';
    }

    return 'fail';
  }
}
