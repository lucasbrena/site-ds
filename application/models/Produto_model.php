<?php

Class Produto_model extends CI_Model {

    /**
     * Função buscar()
     * busca os produtos de acordo com o codigo ou o nome ou o nome_site
     * Retorna um array de objetos ou um array de objetos vazio.
     * @param type $data
     * @return type
     */
    public function buscar($search_data) {
        $this->db->select('*');
        $this->db->from('produto');
        $this->db->group_start();
        $this->db->like('nome', $search_data);
        $this->db->or_like('codigo', $search_data);
        $this->db->or_like('descricao', $search_data);
        $this->db->group_end();

        $query = $this->db->get();

        return $query->result();
    }

    /*
     * view genrenciar produtos
     * lista todos pordutos indepentemente do status
     */

    public function lista_produto() {
        $this->db->select('*');
        $this->db->from('produto');
        $query = $this->db->get();

        return $query->result();
    }

    /*
     * busca imagem para view listar produtos 
     * tmbm busca imagens para view editar produto
     */
    public function busca_imagens_produto($id) {
        $this->db->where('id_produto', $id);
        $get = $this->db->get('imagens_produto');

        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }

    /*
     * busca grupo para view gerenciar listar produtos 
     */
    public function busca_grupo_produto($id_grupo) {
        $this->db->where('id', $id_grupo);
        $get = $this->db->get('grupo');

        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }


    /*
     * busca categoria para view listar produtos 
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * TA ERRADO TIOZAO, FALAR COM O DR. LEONARDO
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     * ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
     */
    public function busca_categoria_produto($id_grupo) {
        $this->db->where('id', $id_grupo);
        $get = $this->db->get('categoria');

        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }
    /*
     * busca os grupos de uma determinada categoria
     */
    public function busca_grupo_categoria($id_categoria) {
        $this->db->where('id_categoria', $id_categoria);
        $get = $this->db->get('grupo');

        if ($get->num_rows() > 0) {
            return $get->result();
        }
        return [];
    }

    /*
     * mostra categoria na view lista categoria
     * mostra categoria na view insere_produto
     * mostra categoria na view insere_grupo
     */
    public function mostra_categoria() {
        $this->db->select('*');
        $this->db->from('categoria');

        $query = $this->db->get();
        return $query->result();
    }
    
      /*
     * mostra grupo na view insere_produto
     */
     public function mostra_grupo() {
        $this->db->select('*');
        $this->db->from('grupo');

        $query = $this->db->get();

        return $query->result();
    }
    
    
    /*
     * função inserir novo produto
     */
    public function insere_produto($data) {
        $buscar = $this->search($data);

        if (empty($buscar)) {
            $this->db->insert('produto', $data);
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
                /*
                 * busca por produto antes de inserir
                 * pertence a função inserir produto
                 */
                private function search($data) {
                    $this->db->where('codigo', $data['codigo']);
                    $get = $this->db->get('produto');
                    if ($get->num_rows() > 0) {
                        return $get->row_array();
                    }
                    return [];
                }

  /*
   * 1 - insere imagens do produto ao inserir novo produto
   * 2 - usada tambem na função editar produto
   */
    public function inserir_imagem_produto($data) {
        $this->db->insert('imagens_produto', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    /*
    * busca produto para view editar produto
    */
    public function buscar_produto($data) {
        $this->db->where('id', $data['id']);
        $get = $this->db->get('produto');

        if ($get->num_rows() > 0) {
            return $get->row_array();
        }
        return [];
    }
    
       
    /*
     * busca grupo para view editar produto
    */
    public function busca_grupo_edita($data) {
        $this->db->where('id', $data['id_grupo']);
        $get = $this->db->get('grupo');

        if ($get->num_rows() > 0) {
            return $get->row_array();
        }
        return [];
    }
    
    
    /**
     * busca grupo para editar produto   
    */
    public function busca_categoria_edita($data) {
        $this->db->where('id', $data['id_categoria']);
        $get = $this->db->get('categoria');

        if ($get->num_rows() > 0) {
            return $get->row_array();
        }
        return [];
    }
    
    /*
     * função editar produto
     * 
    */
    public function edita_produto($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('produto', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    /*
     * função deletar imagens ao editar produto
    */
    public function deletar_imagens($id) {
        $this->db->where('id_produto', $id);
        $this->db->delete('imagens_produto');

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editar_imagem_produto($data) {
        $this->db->update('imagens_produto', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
   
    /*
     * view catalogo do site/somente produtos com 
     * status ativo = 1
     */
    public function catalogo() {
        $this->db->select('*');
        $this->db->from('produto');
        $this->db->where('status', !0);
        $query = $this->db->get();

        return $query->result();
    }
    
    /*
     * view slideshow pag index
     * status site = 2
     */
   

    /*
     * carrega view editar nome do grupo
     */
    public function editar_grupo($data) {
        $this->db->where('id', $data['id']);
        $get = $this->db->get('grupo');

        if ($get->num_rows() > 0) {
            return $get->row_array();
        }
        return [];
    }

    /**
     * função edita nome do grupo
     */
    public function edita_grupo($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('grupo', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    
    /*
     * I do not know 
     * 
     */
    public function show_image() {
        $this->db->select('*');
        $this->db->from('imagens_produto');

        $query = $this->db->get();

        return $query->result();
    }

    

    /*
     * função insere nova categoria
     * 
     */
    public function insere_categoria($data) {
        $lookup = $this->busca_categoria($data);

        if (empty($lookup)) {
            $this->db->insert('categoria', $data);
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
            /*
             * função busca categoria ao inserir uma nova
             * pertence a funcao insere_categoria
             */
            private function busca_categoria($data) {
                $this->db->where('nome', $data['nome']);
                $get = $this->db->get('categoria');
                if ($get->num_rows() > 0) {
                    return $get->row_array();
                }
                return [];
            }

    /**
     * chama view editar categoria    
     */
    public function editar_categoria($data) {
        $this->db->where('id', $data['id']);
        $get = $this->db->get('categoria');

        if ($get->num_rows() > 0) {
            return $get->row_array();
        }
        return [];
    }

    /*
     * funcao edita nome categoria
     */
    public function edita_categoria($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('categoria', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    /*
     * função insere novo grupo
     * 
     */
    public function insere_grupo($data) {
        $this->db->insert('grupo', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    /**
     * jquery - view inserir_produto / editar produto
     * Busca no banco de dados todos os grupos de uma determinada categoria
     * pelo ID.
     * @param type $id_categoria
     * @return type
     */
    public function buscar_grupo($id_categoria) {
        $this->db->select('*');
        $this->db->from('grupo');
        $this->db->where('id_categoria', $id_categoria);

        $query = $this->db->get();

        return $query->result();
    }

    /**
     * jquery - view inserir_produto / editar produto
     * Busca no banco de dados todos as categorias 
     * @return type
     */
    public function buscar_categoria() {
        $this->db->select('*');
        $this->db->from('categoria');

        $query = $this->db->get();

        return $query->result();
    }

}
