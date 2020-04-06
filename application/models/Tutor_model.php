<?php


class Tutor_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getFifthData()
  {
    return $this->db->order_by('id', 'DESC')->limit(5)->get('tbl_tutor')->result_array();
  }

  public function getTutor($postedData)
  {
    $this->db->select('id, name, age, gender, qualification, hourly_rate, avatar, description');
    if (!empty($postedData['hourly_rate'])) {
      $hourly = explode("to", $postedData['hourly_rate']);
      $this->db->where('hourly_rate >', str_replace('$', '', trim($hourly[0])));
      $this->db->where('hourly_rate <', str_replace('$', '', trim($hourly[1])));
    }

    if (!empty($postedData['gender'])) {
      $this->db->where('gender', $postedData['gender']);
    }

    if (!empty($postedData['qualification'])) {
      $this->db->where('qualification', $postedData['qualification']);
    }

    return $this->db->get('tbl_tutor')->result_array();
  }

  public function getPersonalInfo($id)
  {
    return $this->db->where('id', $id)->get('tbl_tutor')->row_array();
  }

  public function getTutorFromTutorPage($postedData)
  {
    if ($postedData['total'] == 'part') {
      if (!empty($postedData['location'])) {
        $this->db->where('location', $postedData['location']);
      }

      if (!empty($postedData['subject'])) {
        $this->db->group_start();
        $this->db->like('subject', $postedData['subject'], 'none');
        $this->db->or_like('subject', ' ' . $postedData['subject'] . ',', 'both');
        $this->db->or_like('subject', $postedData['subject'] . ',', 'after');
        $this->db->or_like('subject', ' ' . $postedData['subject'], 'before');
        $this->db->group_end();
      }

      if (!empty($postedData['grade'])) {
        $this->db->where('location', $postedData['grade']);
      }
    }

    //        $this->db->get('tbl_tutor');
    //        return $this->db->last_query();

    return $this->db->get('tbl_tutor')->result_array();
  }

  public function getTotalNum()
  {
    return $this->db->get('tbl_tutor')->num_rows();
  }

  public function postReview($studentID, $postedData)
  {
    $postedData['student_id'] = $studentID;
    $postedData['post_date'] = date('Y-m-d H:i:s');

    if ($this->db->insert('tbl_tutor_rating', $postedData)) {
      return 'success';
    }

    return 'fail';
  }

  public function getReview($tutor_id)
  {
    return $this->db->from('tbl_tutor_rating one')->join('tbl_student two', 'one.student_id=two.id')->where('tutor_id', $tutor_id)->get()->result_array();
  }

  public function canOfferReview($studentID, $tutorID)
  {
    if ($this->db->where(array('student_id' => $studentID, 'tutor_id' => $tutorID))->get('tbl_tutor_rating')->num_rows() > 0) {
      return false;
    }

    return true;
  }
}
