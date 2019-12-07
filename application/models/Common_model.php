<?php


class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function updateUserInfo($tableName, $id, $postedData)
    {
        $this->db->where('id', $id);
        if ($this->db->update($tableName, $postedData))
        {
            return $this->db->where('id', $id)->get($tableName)->row_array();
        }

        return $this->db->last_query();
//        return false;
    }

    public function updateMembershipInfo($tableName, $id, $postedData)
    {
        $this->db->where('id', $id);
        if ($this->db->update($tableName, $postedData))
        {
            return $this->db->where('id', $id)->get($tableName)->row_array();
        }

        return $this->db->last_query();
//        return false;
    }

    public function getActivityTitle()
    {
        return $this->db->get('tbl_activity_title')->result_array();
    }

    public function getActivities($id)
    {
        $this->db->where('title_id', $id);
        return $this->db->get('tbl_activity_content')->result_array();
    }

    public function getAllSubjects()
    {
        return $this->db->get('tbl_subject')->result_array();
    }

    public function getSubjects($gradeID)
    {
        $this->db->where('grade_id', $gradeID);
        return $this->db->get('tbl_subject')->result_array();
    }

    public function getAllGrades()
    {
        return $this->db->get('tbl_grade')->result_array();
    }

    public function getGrades($IDs)
    {
        foreach ($IDs as $id)
        {
            $this->db->or_where('id', $id);
        }

        return $this->db->get('tbl_grade')->result_array();
    }

    public function getQualifications()
    {
        return $this->db->get('tbl_qualification')->result_array();
    }

    public function getCertification()
    {
        return $this->db->get('tbl_certification')->result_array();
    }

    public function getLocations()
    {
        return $this->db->get('tbl_location')->result_array();
    }

    public function getLocation($id)
    {
        $result = $this->db->where('id', $id)->get('tbl_location')->row_array();

        return $result['name'];
    }

    public function getSelectedName($tableName ,$ids)
    {
        $this->db->select('name');

        foreach (explode(',', $ids) as $id)
        {
            $this->db->or_where('id', $id);
        }

        return $this->db->get($tableName)->result_array();
    }

    public function getLoggedUserInfo()
    {
        $userName = $this->session->userdata('logged_user');
        $tableName = 'tbl_'.$this->session->userdata('logged_type');

        return $this->db->where('name', $userName)->or_where('email', $userName)->get($tableName)->row_array();
    }

    function getTableID($tableName, $name)
    {
        $result = $this->db->where('name', $name)->or_where('email', $name)->get($tableName)->row_array();

        return $result['id'];
    }

    public function getAvgRating($type, $id)
    {
        return $this->db->select('AVG(rating) as avg')->where($type.'_id', $id)->get('tbl_'.$type.'_rating')->row()->avg;
    }

    public function getJobCount($type, $id)
    {
        return $this->db->where($type.'_id', $id)->get('tbl_'.$type.'_rating')->num_rows();
    }

}