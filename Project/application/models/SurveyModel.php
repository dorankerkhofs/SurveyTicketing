<?php


class SurveyModel extends CI_Model
{
    public function getSurveys()
    {

        $query = $this->db->get('survey');
        return $query->result();
    }

    public function getVragen($surveyId)
    {
        $this->db->where('survey_id =', $surveyId);
        $query = $this->db->get('survey_vragen');
        return $query->result();
    }

    function form_insert($antwoorden)
    {
        $this->db->insert('survey_antwoorden', $antwoorden);
    }

    function form_insert_vragen($vragen){
        $this->db->insert('survey_vragen',$vragen);
    }

    function form_insert_surveys($surveys){
        $this->db->insert('survey', $surveys);
    }


}

?>