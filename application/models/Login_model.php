<?php


class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($values)
    {
        $type = $values['type'];
        $name = $values['name'];
        $password = $values['password'];

        $tableName = 'tbl_education';

        if ($type == 'tutor')
        {
            $tableName = 'tbl_tutor';
        }
        elseif ($type == 'student')
        {
            $tableName = 'tbl_student';
        }

        $this->db->where('email', $name);
        $this->db->or_where('name', $name);
        $result = $this->db->get($tableName);

        if ($result->num_rows()==0)
        {
            return "user";
//            return "fail";
        }

        $this->db->where('email', $name);
        $this->db->or_where('name', $name);
        $this->db->where('password', md5($password));
        $result = $this->db->get($tableName);

        if ($result->num_rows()==0)
        {
            return "pass";
            return "fail";
        }

        return "success";
    }

    public function isValidEmail($postedData)
    {
      $this->db->where('email', $postedData['email']);
      $result = $this->db->get('tbl_'.$postedData['type']);

      if ($result->num_rows()>0)
      {
        return true;
      }

      return false;
    }

    public function resetPassword($postedData, $password)
    {
      $this->db->where('email', $postedData['email']);
      if ($this->db->update('tbl_'.$postedData['type'], array('password'=>$password)))
      {
        return true;
      }

      return false;
    }

}