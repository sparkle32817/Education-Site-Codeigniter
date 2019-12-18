<?php


class Education_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFifthData()
    {
        return $this->db->order_by('id', 'DESC')->limit(5)->get('tbl_education')->result_array();
    }

    public function getAllEducation()
    {
        return $this->db->get('tbl_education')->result_array();
    }

    public function getPersonalInfo($id)
    {
        return $this->db->where('id', $id)->get('tbl_education')->row_array();
    }

    public function getTotalNum()
    {
        return $this->db->get('tbl_education')->num_rows();
    }

    public function postReview($studentID, $postedData)
    {
        $postedData['student_id'] = $studentID;
        $postedData['post_date'] = date('Y-m-d H:i:s');

        if ($this->db->insert('tbl_education_rating', $postedData))
        {
            return 'success';
        }

        return 'fail';
    }

    public function getReview($education_id)
    {
        return $this->db->from('tbl_education_rating one')->join('tbl_student two', 'one.student_id=two.id')->where('education_id', $education_id)->get()->result_array();
    }

    public function canOfferReview($studentID, $education_id)
    {
        if ($this->db->where(array('student_id'=>$studentID, 'education_id'=>$education_id))->get('tbl_education_rating')->num_rows()>0)
        {
            return false;
        }

        return true;
    }
}