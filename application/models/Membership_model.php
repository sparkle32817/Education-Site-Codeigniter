<?php


class Membership_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEducationAmount()
    {
        return $this->db->where('type', 'education')->get('tbl_membership')->row()->amount;
    }

    public function getTutorAmount($kind)
    {
        return $this->db->where('type', 'tutor-'.$kind)->get('tbl_membership')->row()->amount;
    }
}