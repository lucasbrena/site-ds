<?php

Class Slide_model extends CI_Model {
    
    /*
     * lista slides na index do site 
     */
    public function slide_index() {
        $this->db->select('*');
        $this->db->from('slide');
        $this->db->where('status', !0);
        $query = $this->db->get();

        return $query->result();
    }
    
     /*
     * lista slides na view do painel
     */
    public function lista_slide() {
        $this->db->select('*');
        $this->db->from('slide');       
        $query = $this->db->get();

        return $query->result();
    }
    /*
     * insere um novo slide
     */
    public function insere_slide($data) {
        $this->db->insert('slide', $data);
        return $this->db->insert_id();
    }
    /*
     * insere imagens ao inserir um novo slide
     * usado para funcao editar slide
     */
     public function inserir_imagem_slide($data) {
        $this->db->insert('imagens_slide', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
   
    
    /*
     * busca informaçoes para view editar slides
     */
     public function buscar_slide($data) {
           $this->db->where('id', $data['id']);
           $get = $this->db->get('slide');

           if ($get->num_rows() > 0) {
               return $get->row_array();
           }
           return [];
       }
       
     /*
      * busca imagens para view index 
      * busca imagens para view gerenciar slides
      * busca imagens para view editar slides
      */  
     public function busca_imagens_slide($id) {
        $this->db->where('id_slide', $id);
        $get = $this->db->get('imagens_slide');
        
        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }
    
    /*
     * funcao edita slide
     */
    public function editar_slide($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('slide', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    /*
     * deleta img ao editar uma nova
     */
     public function deletar_imagens($id){
        $this->db->where('id_slide', $id);
        $this->db->delete('imagens_slide');

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
