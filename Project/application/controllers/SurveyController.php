<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyController extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('hiddenAantal', 'HiddenField', 'required');

        if ($this->form_validation->run() == FALSE) {

        } else {

            $vraagID = $this->input->post('hiddenVraagID');
            $aantalVragen = $this->input->post('hiddenAantal');
            $surveyID = $this->input->post('hiddenSurveyID');
            for ($x = 1; $x <= $aantalVragen; $x++) {

                $dataarray = array(
                    'antwoord_id' => NULL,
                    'survey_id' => $surveyID,
                    'vraag_id' => $vraagID,
                    'user_id' => 1, //moet nog juist gezet worden
                    'antwoord_body' => $this->input->post('inputNaam' . $x),
                );

                $vraagID = $vraagID +1;

                $this->SurveyModel->form_insert($dataarray);
            }
        }
    }

}