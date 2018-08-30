<?php

Class Curso_model extends CI_Model {
    
   /*
    * mostra curso a realizar
    * com status 0
    */
     public function lista_curso_a_realizar() {
        $this->db->select('*');
        $this->db->from('curso');
        $this->db->where('status', !1);
        $query = $this->db->get();

        return $query->result();
    } 
     public function lista_curso_realizado() {
        $this->db->select('*');
        $this->db->from('curso');
        $this->db->where('status', !0);
        $this->db->order_by("data");
        $query = $this->db->get();

        return $query->result();
    } 
    /*
    * função lista curso p/ view 
    * mostra cursos site realizados com status 1
    */
    public function lista_curso() {
        $this->db->select('*');
        $this->db->from('curso');      
        $query = $this->db->get();

        return $query->result();
    } 
    
    
    /*
     * busca imagem p/ vizualização na lista cursos
     * 
     */
     public function busca_imagens_curso($id) {
        $this->db->where('id_curso', $id);
        $get = $this->db->get('imagens_curso');
        
        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }
    
    /*
     * insere novo curso
     */
     public function insere_curso($data) {  
        $this->db->insert('curso', $data);
        
        return $this->db->insert_id();   
                        
    }
    
           
    /*
   * 1 - insere imagens do curso ao inserir novo produto
   * 
   */       
     public function inserir_imagem_curso($data) {
        $this->db->insert('imagens_curso', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
  
    
    public function editar_curso($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('curso', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
   
    public function editar_imagem_curso($data) {
        $this->db->update('imagens_curso', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function deletar_imagens($id){
        $this->db->where('id_curso', $id);
        $this->db->delete('imagens_curso');

        return ($this->db->affected_rows() != 1) ? false : true;
    }
 
    public function buscar_curso($data) {
           $this->db->where('id', $data['id']);
           $get = $this->db->get('curso');

           if ($get->num_rows() > 0) {
               return $get->row_array();
           }
           return [];
       }
  

    public function deletar_curso($data) {
        $this->db->where('id', $data['id']);
        $this->db->delete('curso', $data);      
                
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
  
  
    
   
}
