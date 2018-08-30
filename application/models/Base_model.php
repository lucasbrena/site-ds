<?php

Class Base_model extends CI_Model {

    /**
     * Função Inserir()
     * Insere um registro no banco de dados ou o atualiza caso exista
     * Retorna TRUE se inserido ou FALSE se atualizado
     * @param type $data
     * @return boole
     */
    public function inserir($data) {

        $sql = 'INSERT INTO produto (codigo, nome, preco, catalogo, descricao)
        VALUES (?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            codigo=VALUES(codigo), 
            nome=VALUES(nome), 
            preco=VALUES(preco),
            catalogo=VALUES(catalogo),
            descricao=VALUES(descricao)';

        $this->db->query($sql, $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    

}
