<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DropController extends CI_Controller
{

    public function index()
    {
        //loading helper classes
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        //loading models
        $this->load->model('SurveyModel');

        //functions
        $this->loadDropdown();
    }

    public function loadDropdown()
    {
        $data['records'] = $this->SurveyModel->getSurveys();

        $this->load->view('SurveyView', $data);

        $this->form_validation->set_rules('nameDrop', 'Dropdown namen', 'required');
        if ($this->form_validation->run() == FALSE) {

        } else {
            $id = $this->input->post('nameDrop');
            $vragen['vragen'] = $this->SurveyModel->getVragen($id);
            $this->load->view('vragenView', $vragen);
        }
    }


}