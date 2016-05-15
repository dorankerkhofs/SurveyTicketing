<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function index()
    {
        $data['records'] = $this->SurveyModel->getSurveys();

        $this->load->view('AdminView', $data);
    }

    public function insertQuestion(){

        $surveyName = $this->input->post('first');
        $surveyQuestion = $this->input->post('second');
        $surveyType = $this->input->post('third');

        $surveyArray = array("survey_id" => $surveyName, "vraag_body" => $surveyQuestion, "vraag_soort" => $surveyType);

        $this->SurveyModel->form_insert_vragen($surveyArray);
    }
}
