<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function index()
    {

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('SurveyModel');

        $data['records'] = $this->SurveyModel->getSurveys();


        $this->form_validation->set_rules('keuze', 'Keuze', 'required');
        $this->form_validation->set_rules('vraagNaam', 'VraagNaam', 'required');
        $this->form_validation->set_rules('radioNaam', 'RadioNaam', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('AdminView', $data);
        } else {
            $dataarray = array(
                'vraag_id' => NULL,
                'survey_id' => $this->input->post('keuze'),
                'vraag_body' => $this->input->post('vraagNaam'),
                'vraag_soort' => $this->input->post('radioNaam'),
            );

            $this->SurveyModel->form_insert_vragen($dataarray);
        }


    }
}
