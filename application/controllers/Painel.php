<?php

// somente funcao de login aqui 

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Painel extends CI_Controller { 
    
// Inicio função Login
    public function index() {
        if (!$this->session->userdata('logged')) {//se usuario não esta logado, é direcionado para a pag de login
            redirect('login');
        }
        $data['usuario'] = $this->session->userdata('usuario');//se logado, é direcionado para pag painel
        $this->template->showAdmin('admin/painel', $data);
    }// FIM função Login


}
