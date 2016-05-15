<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoegSurveyToeController extends CI_Controller
{

    public function index()
    {
        $this->load->view('VoegSurveyToeView');

    }


    public function addSurvey(){
        $insert = array('survey_name' => $this->input->post('data'));
        $this->SurveyModel->form_insert_surveys($insert);
    }
}
