<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyController extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('SurveyModel');
        $data['records'] = $this->SurveyModel->getSurveys();

        $this->load->view('SurveyView', $data);

    }

    function loadQuestions()
    {
        $id = $this->input->post('data');

        echo $id;

        if ($id == null) {
            echo "geen survey gevonden!";
        } else {

            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->model('SurveyModel');

            $vragen['vragen'] = $this->SurveyModel->getVragen($id);
            $aantalVragen = count($vragen['vragen']);

            for ($x = 1; $x <= $aantalVragen; $x++) {
                $this->form_validation->set_rules('inputNaam' . $x, 'InputNaam' . $x, 'required');
            }

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('vragenView', $vragen);
            } else {

                for ($x = 1; $x <= $aantalVragen; $x++) {

                    $dataarray = array(
                        'antwoord_id' => NULL,
                        'survey_id' => $id,
                        'vraag_id' => $x,
                        'user_id' => 1, //moet nog juist gezet worden
                        'antwoord_body' => $this->input->post('inputNaam' . $x),
                    );

                    $this->SurveyModel->form_insert($dataarray);
                }
            }
        }

    }
}