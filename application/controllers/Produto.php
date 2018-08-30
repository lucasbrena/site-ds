<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produto extends CI_Controller {

    private $URL_PATH = 'imagens/produtos/';
    private $ALLOWED_TYPES = 'jpg';

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('admin/painel');
    }

    /**
     * 
     */
    public function buscar() {
        $this->load->model('produto_model');

        $search_data = $this->input->post('search_data');

        $produtos = $this->produto_model->buscar($search_data);

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');

        if (!empty($produtos)) {
            echo json_encode($produtos);
        } else {
            echo json_encode([]);
        }
    }

     /**
     * view lista produtos 
     */
    public function lista_produto() {
        $this->load->model('produto_model');

        $produtos = $this->produto_model->lista_produto();

        for ($i = 0; $i < sizeof($produtos); $i++) {
            $produtos[$i]->imagens = $this->produto_model->busca_imagens_produto($produtos[$i]->id);
            $produtos[$i]->grupo = $this->produto_model->busca_grupo_produto($produtos[$i]->id_grupo);
            $produtos[$i]->categoria = $this->produto_model->busca_categoria_produto($produtos[$i]->id_grupo);
        }

        $data['produtos'] = $produtos;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/lista_produto', $data);
    }
    

    /** 
     * view Inserir produto
     */
    public function inserir_produto() {
        $this->load->model('produto_model');

        $categorias = $this->produto_model->mostra_categoria();
        $data['categorias'] = $categorias;

        $grupos = $this->produto_model->mostra_grupo();
        $data['grupos'] = $grupos;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/insere_produto', $data);
    }

    /**
     * funcão de inserir novo produto
     */
    public function insere_produto() {
        $sucesso = false;
        $this->load->model('produto_model');
        $this->load->library('upload');

        $id_grupo = $this->input->post('grupo');
        $codigo = $this->input->post('codigo');
        $nome = $this->input->post('nome');
        $preco = $this->input->post('preco');
        $descricao = $this->input->post('descricao');

        $data['id_grupo'] = $id_grupo;
        $data['codigo'] = $codigo;
        $data['nome'] = $nome;
        $data['preco'] = $preco;
        $data['descricao'] = $descricao;

        $id_produto = $this->produto_model->insere_produto($data);

        if ($id_produto != false) {

            $number_of_files_uploaded = count($_FILES['upl_files']['name']);

            for ($i = 0; $i < $number_of_files_uploaded; $i++) {
                $randon = rand(1000, 9999);
                $_FILES['userfile']['name'] = $_FILES['upl_files']['name'][$i];
                $_FILES['userfile']['type'] = $_FILES['upl_files']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $_FILES['upl_files']['error'][$i];
                $_FILES['userfile']['size'] = $_FILES['upl_files']['size'][$i];
                $config = array(
                    'file_name' => $randon . "_" . $codigo,
                    'allowed_types' => $this->ALLOWED_TYPES,
                    'max_size' => 3000,
                    'overwrite' => FALSE,
                    'upload_path' => $this->URL_PATH,
                );
                $this->upload->initialize($config);
                if ($this->upload->do_upload()) {
                    $data_imagem_produto['id_produto'] = $id_produto;
                    $data_imagem_produto['url_image'] = $this->URL_PATH . $randon . "_" . $codigo . "." . $this->ALLOWED_TYPES;

                    if ($this->produto_model->inserir_imagem_produto($data_imagem_produto)) {
                        $sucesso = true;
                    }
                }
            }
        }
        if ($sucesso) {
            $retorno['erro'] = "produto inserido com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_produto', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível inserir produto ou as imagens. " . $this->upload->display_errors() . $id_produto;
            $this->template->showAdmin('admin/insere_produto', $retorno);
        }
    }

    /*
     * chama view editar produto
     */
    public function editar_produto() {
        $this->load->model('produto_model');

        $data_buscar['id'] = $this->uri->segment(3); //terceiro parametro da url que esta sendo enviado

        $data['produto'] = $this->produto_model->buscar_produto($data_buscar);
        
        if ($data['produto']['status'] == '0'){
            $data['produto']['status'] = 'Inativo';
        } 
        if ($data['produto']['status'] == '1'){             
            $data['produto']['status'] = 'Ativo';
        }elseif ($data['produto']['status'] == '2') {
            $data['produto']['status'] = 'Site';
        } 
            
        
            
        
        
        $data['imagens'] = $this->produto_model->busca_imagens_produto($data_buscar['id']);
        $data['grupo'] = $this->produto_model->busca_grupo_edita($data['produto']);
        $data['categoria'] = $this->produto_model->busca_categoria_edita($data['grupo']);

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/editar_produto', $data);
    }

    /**
     * antes de inserir uma nova imagem está função deleta a imagem atual
     * 
     */
    public function deletar_image($image) {
        unlink($image);
    }
    
    
    /**
     * função editar produto
     * 
     */
    public function edita_produto() {
        $this->load->model('produto_model');
        $this->load->library('upload');
        $sucesso = false;

        $id = $this->input->post('id');                  
        $nome = $this->input->post('nome');
        $preco = $this->input->post('preco');
        $descricao = $this->input->post('descricao');
        $grupo = $this->input->post('grupo');
        $status = $this->input->post('status');

        $data['id'] = $id;        
        $data['nome'] = $nome;
        $data['preco'] = $preco;
        $data['descricao'] = $descricao;
        $data['status'] = $status;
        $data['id_grupo'] = $grupo;

        $retorno['retorno'] = $this->produto_model->edita_produto($data);

        $this->produto_model->deletar_imagens($id);

        $number_of_files_uploaded = count($_FILES['upl_files']['name']);

        for ($i = 0; $i < $number_of_files_uploaded; $i++) {

            $randon = rand(1000, 9999);
            $_FILES['userfile']['name'] = $_FILES['upl_files']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['upl_files']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $_FILES['upl_files']['error'][$i];
            $_FILES['userfile']['size'] = $_FILES['upl_files']['size'][$i];
            $config = array(
                'file_name' => $randon . "_" . $id,
                'allowed_types' => $this->ALLOWED_TYPES,
                'max_size' => 3000,
                'overwrite' => FALSE,
                'upload_path' => $this->URL_PATH,
            );
            $this->upload->initialize($config);
            if ($this->upload->do_upload()) {
                $data_imagem_produto['id_produto'] = $id;
                $data_imagem_produto['url_image'] = $this->URL_PATH . $randon . "_" . $id . "." . $this->ALLOWED_TYPES;

                if ($this->produto_model->inserir_imagem_produto($data_imagem_produto)) {
                    $sucesso = true;
                }
            }
        }

        if ($sucesso) {
            $retorno['erro'] = "produto editado com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível editar produto ou as imagens. " . $this->upload->display_errors() . $id;
            $this->template->showAdmin('admin/painel', $retorno);
        }
    }

    

    /**
     * sem uso
     * função deletar produto     
     */
    //public function deletar_produto() {
        //$this->load->model('produto_model');

        //$data_buscar['codigo'] = $this->uri->segment(3);

        //$data['produto'] = $this->produto_model->deletar_produto($data_buscar);

        //if (empty($data['retorno'])) {
            //$data['erro'] = "Deletado com sucesso!";

            //$data['usuario'] = $this->session->userdata('usuario');
            //$this->template->showAdmin('admin/painel', $data);
        //} else {
            //$data['erro'] = "Não deletado!";

            //$data['usuario'] = $this->session->userdata('usuario');
            //$this->template->showAdmin('admin/painel', $data);
        //}
    //}
   

    /**
    * view lista categoria
    */
    public function mostra_categoria() {
        $this->load->model('produto_model');

        $categorias = $this->produto_model->mostra_categoria();

        $data['categorias'] = $categorias;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/lista_categoria', $data);
    }

    /**
     * view inserir categoria
     */
    public function inserir_categoria() {
        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/insere_categoria', $data);
    }

    /**
     * função insere categoria
     */
    public function insere_categoria() {
        $this->load->model('produto_model');
        $this->load->library('upload');

        $nome = $this->input->post('nome');

        $data['nome'] = $nome;

        $id_categoria = $this->produto_model->insere_categoria($data);

        if ($id_categoria != false) {
            $retorno['erro'] = "Categoria inserida com sucesso!";

            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_categoria', $retorno);
        } else {
            $retorno['erro'] = "Não foi possível inserir categoria. ";

            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_categoria', $retorno);
        }
    }

    /**
     * chama view editar categoria
     * 
     */
    public function editar_categoria() {
        $this->load->model('produto_model');

        $data_buscar['id'] = $this->uri->segment(3); //terceiro parametro da url que esta sendo enviado

        $data['categoria'] = $this->produto_model->editar_categoria($data_buscar);

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/editar_categoria', $data);
    }

    /* 
     * função edita categoria 
     */
    public function edita_categoria() {
        $this->load->model('produto_model');
        $this->load->library('upload');
        $sucesso = false;

        $id = $this->input->post('id');
        $nome = $this->input->post('nome');

        $data['id'] = $id;
        $data['nome'] = $nome;

        $retorno['retorno'] = $this->produto_model->edita_categoria($data);

        if ($sucesso) {
            $retorno['erro'] = "Não foi possível editar categoria.";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Categoria editada com sucesso! " . $this->upload->display_errors() . $id;
            $this->template->showAdmin('admin/painel', $retorno);
        }
    }

    /**
     * view lista grupos
     */
    public function mostra_grupo() {
        $this->load->model('produto_model');

        $grupos = $this->produto_model->mostra_grupo();
        $data['grupos'] = $grupos;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/lista_grupo', $data);
    }

    /*
     * view inserir novo grupo    
     */
    public function inserir_grupo() {
        $this->load->model('produto_model');

        $categorias = $this->produto_model->mostra_categoria();

        $data['categorias'] = $categorias;

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/insere_grupo', $data);
    }

    /**
     * função insere novo grupo
     */
    public function insere_grupo() {
        $this->load->model('produto_model');

        $id_categoria = $this->input->post('categoria');
        $nome = $this->input->post('nome');

        $data['id_categoria'] = $id_categoria;
        $data['nome'] = $nome;

        $ok = $this->produto_model->insere_grupo($data);

        if ($ok != false) {
            $retorno['erro'] = "Grupo inserido com sucesso!";

            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_grupo', $retorno);
        } else {
            $retorno['erro'] = "Não foi possível inserir grupo. ";

            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_grupo', $retorno);
        }
    }

    /*
     * chama view editar nome do grupo    
     */
    public function editar_grupo() {
        $this->load->model('produto_model');

        $data_buscar['id'] = $this->uri->segment(3);
        
        $data['grupo'] = $this->produto_model->editar_grupo($data_buscar);

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/editar_grupo', $data);
    }

    /**
     * função editar nome do grupo      
     */
    public function edita_grupo() {
        $this->load->model('produto_model');
        $this->load->library('upload');
        $sucesso = false;

        $id = $this->input->post('id');
        $nome = $this->input->post('nome');

        $data['id'] = $id;
        $data['nome'] = $nome;

        $retorno['retorno'] = $this->produto_model->edita_grupo($data);

        if ($sucesso) {
            $retorno['erro'] = "Não foi possível editar grupo.";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "grupo editado com sucesso " . $this->upload->display_errors() . $id;
            $this->template->showAdmin('admin/painel', $retorno);
        }
    }

    /**
     * Busca os grupos de determinada categoria pelo ID
     * ESTA SENDO USADO PELO JQUERY DA VIEW EDITAR_PRODUTO
     */
    public function buscar_grupo() {
        $this->load->model('produto_model');

        $id_categoria = $this->input->post('id_categoria');
        $grupo = $this->produto_model->buscar_grupo($id_categoria);

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');

        if (!empty($grupo)) {
            echo json_encode($grupo);
        } else {
            echo json_encode([]);
        }
    }

    public function buscar_categoria() {
        $this->load->model('produto_model');

        $categoria = $this->produto_model->buscar_categoria();

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');

        if (!empty($categoria)) {
            echo json_encode($categoria);
        } else {
            echo json_encode([]);
        }
    }

}
