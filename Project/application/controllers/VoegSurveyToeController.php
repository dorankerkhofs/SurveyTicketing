<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoegSurveyToeController extends CI_Controller
{

    public function index()
    {

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('SurveyModel');

        $this->form_validation->set_rules('dataNaam', 'SurveyNaam', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('VoegSurveyToeView');
        } else {
            $dataarray = array(
                'survey_id' => NULL,
                'survey_name' => $this->input->post('dataNaam'),
            );

            $this->SurveyModel->form_insert_surveys($dataarray);
        }


    }
}
