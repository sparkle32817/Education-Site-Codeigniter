<?php


class Membership_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function updateMembershipInfo($tableName, $id, $postedData)
  {
    $this->db->where('id', $id);
    if ($this->db->update($tableName, $postedData)) {
      return true;
    }

    return false;
  }

  public function getEducationAmount()
  {
    return $this->db->where('type', 'education')->get('tbl_membership')->row()->amount;
  }

  public function getTutorAmount($kind)
  {
    return $this->db->where('type', 'tutor-' . $kind)->get('tbl_membership')->row()->amount;
  }

  public function checkMembership($userName, $userType)
  {
    return $this->db->where('name', $userName)->get('tbl_' . $userType)->row()->membership_type;
  }

  public function getMessageCount($userName, $userType)
  {
    return $this->db->from('tbl_message')->where(array('sender_name' => $userName, 'sender_type' => $userType))->get()->num_rows();
  }
}
