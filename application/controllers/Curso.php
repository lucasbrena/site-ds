<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso extends CI_Controller {

    private $URL_PATH = 'imagens/cursos/';
    private $ALLOWED_TYPES = 'jpg';

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('admin/painel');
    }


   

    /*
     *  função lista cursos 
     *  chama view
     */
    public function lista_curso() {
        $this->load->model('curso_model');

        $curso = $this->curso_model->lista_curso();
        // $imagens = [];
        for ($i = 0; $i < sizeof($curso); $i++) {
            $curso[$i]->imagens = $this->curso_model->busca_imagens_curso($curso[$i]->id);
        }
        $data['curso'] = $curso;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/lista_curso', $data);
    }

   /*
    * funcão de inserir novo curso
    */
    public function insere_curso() {
        $sucesso = false;
        $this->load->model('curso_model');
        $this->load->library('upload');

        $nome = $this->input->post('nome');
        $preco = $this->input->post('preco');
        $data_string = $this->input->post('data'); //recebe data como string da view 

        $data_formatada = date_format(date_create($data_string), "Y-m-d");  //transforma string em datetime 

        $professor = $this->input->post('professor');
        $descricao = $this->input->post('descricao');
        

        $data['nome'] = $nome;
        $data['preco'] = $preco;
        $data['data'] = $data_formatada;
        $data['professor'] = $professor;
        $data['descricao'] = $descricao;
        

        $id_curso = $this->curso_model->insere_curso($data);

        if ($id_curso != false) {

            $number_of_files_uploaded = count($_FILES['upl_files']['name']);

            for ($i = 0; $i < $number_of_files_uploaded; $i++) {
                $randon = rand(1000, 9999);
                $_FILES['userfile']['name'] = $_FILES['upl_files']['name'][$i];
                $_FILES['userfile']['type'] = $_FILES['upl_files']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $_FILES['upl_files']['error'][$i];
                $_FILES['userfile']['size'] = $_FILES['upl_files']['size'][$i];
                $config = array(
                    'file_name' => $randon . "_" . $nome,
                    'allowed_types' => $this->ALLOWED_TYPES,
                    'max_size' => 3000,
                    'overwrite' => FALSE,
                    'upload_path' => $this->URL_PATH,
                );
                $this->upload->initialize($config);
                if ($this->upload->do_upload()) {
                    $data_imagem_curso['id_curso'] = $id_curso;
                    $data_imagem_curso['url_image'] = $this->URL_PATH . $randon . "_" . $nome . "." . $this->ALLOWED_TYPES;

                    if ($this->curso_model->inserir_imagem_curso($data_imagem_curso)) {
                        $sucesso = true;
                    }
                }
            }
        }

        if ($sucesso) {
            $retorno['erro'] = "Curso inserido com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_curso', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível inserir curso ou as imagens. " . $this->upload->display_errors() . $id_curso;
            $this->template->showAdmin('admin/insere_curso', $retorno);
        }
    }

    /*
     * busca informações de curso na base e retorna na view editar curso
     * 
     */
    public function editar_curso() {
        $this->load->model('curso_model');

        $data_buscar['id'] = $this->uri->segment(3); //terceiro parametro da url que esta sendo enviado

        $data['curso'] = $this->curso_model->buscar_curso($data_buscar);
        
        if ($data['curso']['status'] == '0'){
            $data['curso']['status'] = 'A Realizar';
        } else{             
            $data['curso']['status'] = 'Realizado';
        }
        
        $data['imagens'] = $this->curso_model->busca_imagens_curso($data_buscar['id']);

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/editar_curso', $data);
    }

    /**
     * antes de inserir uma nova imagem está função deleta a imagem atual
     * 
     */
    public function deletar_image($image) {
        unlink($image);
    }
    
    /*
     * função de edição de curso 
     * 
     */
    public function edita_curso() {
        $this->load->model('curso_model');
        $this->load->library('upload'); 
        $sucesso = false;

        $id = $this->input->post('id');       
        $nome = $this->input->post('nome');
        $preco = $this->input->post('preco');
        
        $data_string = $this->input->post('data');
        $data_formatada = date_format(date_create($data_string), "Y-m-d");
        
        $professor = $this->input->post('professor');
        $descricao = $this->input->post('descricao');
        $status = $this->input->post('status');
        
        $data['id'] = $id;
        $data['nome'] = $nome;
        $data['preco'] = $preco;
        $data['data'] = $data_formatada;
        $data['professor'] = $professor;
        $data['descricao'] = $descricao;
        $data['status'] = $status;
        
        $retorno['retorno'] = $this->curso_model->editar_curso($data);

        $this->curso_model->deletar_imagens($id);
        $number_of_files_uploaded = count($_FILES['upl_files']['name']);

        for ($i = 0; $i < $number_of_files_uploaded; $i++) {

            $randon = rand(1000, 9999);
            $_FILES['userfile']['name'] = $_FILES['upl_files']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['upl_files']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $_FILES['upl_files']['error'][$i];
            $_FILES['userfile']['size'] = $_FILES['upl_files']['size'][$i];
            $config = array(
                'file_name' => $randon . "_" . $nome,
                'allowed_types' => $this->ALLOWED_TYPES,
                'max_size' => 3000,
                'overwrite' => FALSE,
                'upload_path' => $this->URL_PATH,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload()) {
                $data_imagem_curso['id_curso'] = $id;
                $data_imagem_curso['url_image'] = $this->URL_PATH . $randon . "_" . $nome . "." . $this->ALLOWED_TYPES;

                if ($this->curso_model->inserir_imagem_curso($data_imagem_curso)) {
                    $sucesso = true;
                }
            }
        }

        if ($sucesso) {
            $retorno['erro'] = "curso editado com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível editar curso ou as imagens. " . $this->upload->display_errors() . $id;
            $this->template->showAdmin('admin/painel', $retorno);
        }
    }

    /*
     *  função deletar curso 
     *
    public function deletar_curso() {
        $this->load->model('curso_model');

        $data_buscar['id'] = $this->uri->segment(3);

        $data['curso'] = $this->curso_model->deletar_curso($data_buscar);


        if (empty($data['retorno'])) {
            $data['erro'] = "Deletado com sucesso!";

            $data['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $data);
        } else {
            $data['erro'] = "Não deletado!";

            $data['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $data);
        }
    }*/

    /**
     * Função multiple_upload() recebe atraves do upl_files os arquivos da view
     * faz um FOR inserindo esses arquivos no servidor, retorna TRUE se deu certo
     * ou FALSE se encontrou algum erro.
     * @param type $codigo
     * @return boolean
     */
}
