<?php
class Ajaxsearch_model extends CI_Model
{
    
 
public function get_autocomplete($search_data){


    $this->db->where("nome LIKE '%$search_data%'");
        $get = $this->db->get('produto');
        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
}
 
}  