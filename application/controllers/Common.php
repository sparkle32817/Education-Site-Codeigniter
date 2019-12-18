<?php


class Common extends CI_Controller
{
    var $loggedUserInfo;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Common_model');

        $loggedUser = $this->session->userdata('logged_user');
        if (isset($loggedUser))
        {
            $this->loggedUserInfo = $this->Common_model->getLoggedUserInfo();
        }
    }

    public function getGrades()
    {
        $results = $this->Common_model->getAllGrades();

        $returnVal = array();
        $returnVal['curInfo'] = $this->loggedUserInfo['grade'];
        foreach ($results as $result) {
            $returnVal['grades'][] = array('id'=>$result['id'], 'text'=>$result['name']);;
        }

        echo json_encode($returnVal);
    }

    public function getSubjects()
    {
        $postedData = $this->input->post();

        if (empty($postedData["ids"]))
        {
            echo json_encode(array());
            exit;
        }

        $results = $this->Common_model->getGrades($postedData["ids"]);

        $returnVal = array();
        foreach ($results as $result) {

            $subjects = $this->Common_model->getSubjects($result['id']);

            $data = array();
            $data['text'] = $result['name'];
            foreach ($subjects as $subject)
            {
                $data['children'][] = array('id'=>$subject['id'], 'text'=>$subject['name']);
            }

            $returnVal[] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getInitSubjects()
    {
        $postedData = $this->input->post();

        if (empty($postedData["ids"]))
        {
            echo json_encode(array());
            exit;
        }

        $results = $this->Common_model->getGrades($postedData["ids"]);

        $returnVal = array();
        $returnVal['curInfo'] = $this->loggedUserInfo['subject'];
        foreach ($results as $result) {

            $subjects = $this->Common_model->getSubjects($result['id']);

            $data = array();
            $data['text'] = $result['name'];
            foreach ($subjects as $subject)
            {
                $data['children'][] = array('id'=>$subject['id'], 'text'=>$subject['name']);
            }

            $returnVal['subjects'][] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getSubjectsBySingle()
    {
        $postedData = $this->input->post();

        if (empty($postedData['gradeId']))
        {
            echo json_encode(array());
            exit;
        }

        $subjects = $this->Common_model->getSubjects($postedData['gradeId']);

        $data = array();
        foreach ($subjects as $subject)
        {
            $data[] = array('id'=>$subject['id'], 'text'=>$subject['name']);
        }

        echo json_encode($data);
    }

    public function getActivities()
    {
        $results = $this->Common_model->getActivityTitle();

        $returnVal = array();
        $returnVal['curInfo'] = $this->loggedUserInfo['activity'];
        foreach ($results as $result) {

            $subjects = $this->Common_model->getActivities($result['id']);

            $data = array();
            $data['text'] = $result['name'];
            foreach ($subjects as $subject)
            {
                $data['children'][] = array('id'=>$subject['id'], 'text'=>$subject['name']);
            }

            $returnVal['activities'][] = $data;
        }

        echo json_encode($returnVal);
    }

    public function getLocations()
    {
        $results = $this->Common_model->getLocations();

        $returnVal = array();
        $returnVal['curInfo'] = $this->loggedUserInfo['location'];
        foreach ($results as $result) {
            $returnVal['locations'][] = array('id'=>$result['id'], 'text'=>$result['name']);;
        }

        echo json_encode($returnVal);
    }

}
