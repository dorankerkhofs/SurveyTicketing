<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BekijkResultatenController extends CI_Controller
{

    public function index()
    {

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('SurveyModel');
        $data['antwoorden'] = $this->SurveyModel->getAntwoorden();
        $data['vragen'] = $this->SurveyModel->getAlleVragen();

        $this->load->view('BekijkResultatenView', $data);

    }

    function getSurveyID()
    {
        $this->load->model('SurveyModel');
        $id = $this->input->post('data');

        $query = $this->SurveyModel->getJoin($id);

        echo json_encode($query);
    }

}