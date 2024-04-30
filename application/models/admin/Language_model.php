<?php
class Language_model extends CI_Model
{

    function languageList()
    {
        $query = $this->db->get('language');
        return $query->result();
    }
}
