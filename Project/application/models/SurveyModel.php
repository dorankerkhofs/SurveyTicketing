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

    public function getAlleVragen()
    {
        $query = $this->db->get('survey_vragen');
        return $query->result();
    }

    function form_insert($antwoorden)
    {
        $this->db->insert('survey_antwoorden', $antwoorden);
    }

    function form_insert_vragen($vragen)
    {
        $this->db->insert('survey_vragen', $vragen);
    }

    function form_insert_surveys($surveys)
    {
        $this->db->insert('survey', $surveys);
    }

    public function getAntwoorden()
    {
        $query = $this->db->get('survey_antwoorden');
        return $query->result();
    }

    public function getJoin($surveyid)
    {

        $query = $this->db->query('select s.survey_name, sv.vraag_body, sa.antwoord_body
                                    from survey_vragen sv
                                    join survey_antwoorden sa
                                    on sv.survey_id = sa.survey_id
                                    join survey s
                                    on s.survey_id = sa.survey_id
                                    where sa.vraag_id = sv.vraag_id
                                    and sa.survey_id = '.$surveyid);

        return $query->result_array();
    }


}

?>