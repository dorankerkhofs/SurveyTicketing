<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DropController extends CI_Controller
{

    public function index()
    {
        $data['records'] = $this->SurveyModel->getSurveys();

        $this->load->view('SurveyView', $data);

        $this->form_validation->set_rules('nameDrop', 'Dropdown namen', 'required');
        if ($this->form_validation->run() == FALSE) {

        } else {
            $id = $this->input->post('nameDrop');
            $vragen['vragen'] = $this->SurveyModel->getVragen($id);
            $this->load->view('VragenView', $vragen);
        }
    }


}