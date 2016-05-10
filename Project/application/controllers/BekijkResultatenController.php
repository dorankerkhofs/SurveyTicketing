<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BekijkResultatenController extends CI_Controller
{

    public function index()
    {
        $data['antwoorden'] = $this->SurveyModel->getAntwoorden();
        $data['surveys']=$this->SurveyModel->getSurveys();

        $this->load->view('BekijkResultatenView', $data);
    }

    function getSurveyID()
    {
        $id = $this->input->post('data');
        $query = $this->SurveyModel->getJoin($id);
        $data['queryData'] = json_encode($query);
        $this->load->view('EchoView', $data);
    }

}