<?php

Class Login_model extends CI_Model {

    //recebe dados da controller Login
    public function autenticar($data) {
        
        $this->db->where('usuario', $data['usuario']) //recebe array $data com chave usuario e vefica se existe no BD o usuario passado
                   ->where('senha',$data['senha']); //recebe array $data com chave senha e vefica se existe no BD a senha passada
        $get = $this->db->get('usuario'); //variavel $get 
        if ($get->num_rows() > 0) {  //se a $get, numero de linhas for maior que zero, retorna.....
            return $get->row_array();
        }
        return [];
    }

}
