<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Login extends CI_Controller { // criação da classe Login

    public function index() {
        $this->load->view('admin/login');
    }

    //
    public function autenticar() {
        $this->load->model('login_model');//carrega model Login

        $usuario = $this->input->post('usuario'); //variavel $usuario recebe input da pagina de login 
        $senha = $this->input->post('senha'); //variavel $senha recebe input da pagina de login
      

        $data['usuario'] = $usuario; // array $data com chave usuario recebe variavel $usuario
        $data['senha'] = $senha; // array $data com chave senha recebe variavel $senha
       

        $retorno['retorno'] = $this->login_model->autenticar($data); // array $retorno com chave retorno recebe $data e acessa funcao autenticar na model Login

        if (empty($retorno['retorno'])) {
            $retorno['erro'] = "Usuario e/ou senha incorretos";

            $this->load->view('admin/login', $retorno);
        } else {
            $this->session->set_userdata([
                'logged' => true,
                'usuario' => $retorno['retorno']['usuario']]);
            
            redirect('painel');
        }
    }

    public function logout() {
        $this->session->set_userdata([
                'logged' => false]);
        $this->load->view('admin/login');
    }

}
