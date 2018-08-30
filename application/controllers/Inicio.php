<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    /*
     * busca imagens de slides com status 1 para slideshow na pag index 
     * 
     */

    public function index() {
        $this->load->model('slide_model');

        $slide = $this->slide_model->slide_index();
        // $imagens = [];
        for ($i = 0; $i < sizeof($slide); $i++) {
            $slide[$i]->imagens = $this->slide_model->busca_imagens_slide($slide[$i]->id);
        }
        $data['slide'] = $slide;

        $this->template->show('index', $data);
    }

    /*
     * 
     */

    public function catalogo() {
        $this->load->model('produto_model');

        $produtos = $this->produto_model->catalogo();

        for ($i = 0; $i < sizeof($produtos); $i++) {
            $produtos[$i]->imagens = $this->produto_model->busca_imagens_produto($produtos[$i]->id);
            $produtos[$i]->grupo = $this->produto_model->busca_grupo_produto($produtos[$i]->id_grupo);
            $produtos[$i]->categoria = $this->produto_model->busca_categoria_produto($produtos[$i]->grupo[0]->id_categoria);
        }
        
        $categorias = $this->produto_model->mostra_categoria();
        for($i = 0; $i < sizeof($categorias); $i++) {
            $categorias[$i]->grupos = $this->produto_model->busca_grupo_categoria($categorias[$i]->id);
        }
        
        $data['categorias'] = $categorias;
        $data['produtos'] = $produtos;

        $this->template->show('catalogo', $data);  
        //$this->load->view('teste', $data);
    }

    /*
     * 
     */

    public function busca_categoria_catalogo() {
        $this->load->model('produto_model');

        $categorias = $this->produto_model->mostra_categoria();

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');

        if (!empty($categorias)) {
            echo json_encode($categorias);
        } else {
            echo json_encode([]);
        }
    }

    /*
     * 
     */

    public function busca_grupo_catalogo() {

        $this->load->model('produto_model');

        $id_categoria = $this->input->get('id_categoria');

        $grupos = $this->produto_model->buscar_grupo($id_categoria);

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');

        if (!empty($grupos)) {
            echo json_encode($grupos);
        } else {
            echo json_encode([]);
        }
    }

    /*
     * display na pag site cursos 
     * a realizar curso com status igual a 0
     * 
     * display cursos_realizados com status 1
     */

    public function cursos() {
        $this->load->model('curso_model');

        $curso = $this->curso_model->lista_curso_a_realizar();

        for ($i = 0; $i < sizeof($curso); $i++) {
            $curso[$i]->imagens = $this->curso_model->busca_imagens_curso($curso[$i]->id);
        }
        $data['curso'] = $curso;

        $curso_realizado = $this->curso_model->lista_curso_realizado();
                
        for ($i = 0; $i < sizeof($curso_realizado); $i++) {
            $curso_realizado[$i]->imagens = $this->curso_model->busca_imagens_curso($curso_realizado[$i]->id);
            /*
             * Y/m/d para d/m/y
             */
            $curso_realizado[$i]->data = date("d/m/Y", strtotime($curso_realizado[$i]->data));
        }
        $data['curso_realizado'] = $curso_realizado;


        $this->template->show('cursos', $data);
    }

    /**
     * 
     */
    public function email() {
        $this->load->library('email');

        //Recupera os dados do formulário
        $nome = $this->input->post('Name');
        $email = $this->input->post('Email');
        $telefone = $this->input->post('Telefone');
        $mensagem = $this->input->post('message');
        //Inicia o processo de configuração para o envio do email

        $config['wordwrap'] = TRUE;
        $config['smtp_host'] = 'smtp.dentalsolident.com.br';
        $config['smtp_port'] = 587;
        $config['smtp_user'] = 'dentalsolident@dentalsolident.com.br';
        $config['smtp_pass'] = 'Sol15King';
        $config['protocol'] = 'smtp';
        $config['validate'] = TRUE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';

        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);

        // Define remetente e destinatário
        $this->email->from('dentalsolident@dentalsolident.com.br', 'Dental Solident'); // Remetente
        $this->email->to('lucasbrena@dentalsolident.com.br', $nome); // Destinatário
        // Define o assunto do email
        $this->email->subject('Fale Conosco - Dental Solident');

        $dados['nome'] = $nome;
        $dados['email'] = $email;
        $dados['telefone'] = $telefone;
        $dados['mensagem'] = $mensagem;


        $this->email->message($this->load->view('template/email_template', $dados, TRUE));

        //$data['retorno'] = 'Email enviado com sucesso.';

        $this->cursos();

        /*
         * Se foi selecionado o envio de um anexo, insere o arquivo no email 
         * através do método 'attach' da library 'Email'
         *  if (isset($dados['anexo']))
          $this->email->attach('./assets/images/unici/logo.png');
         */


        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        /* if ($this->email->send()) {

          // set text compatible IE7, IE8
          header('Content-type: text/plain');
          // set json non IE
          header('Content-type: application/json');

          $sucess = "Email enviado com sucesso.";

          $data['retorno'] = 'Email enviado com sucesso.';
          $data['erro'] = FALSE;


          echo json_encode($data);
          } else {
          //$this->session->set_flashdata('error', $this->email->print_debugger());
          //$this->load->view('home');
          // set text compatible IE7, IE8
          header('Content-type: text/plain');
          // set json non IE
          header('Content-type: application/json');

          $sucess = $this->email->print_debugger();

          echo json_encode($sucess);
          }
         * */
    }

    /*
     * 
     */

    public function busca_produtos() {
        $this->load->model('produto_model'); // carrega curso model 

        $search_data = $this->input->get('search_data');

        $produtos = $this->produto_model->buscar($search_data);

        $data = [];
        foreach ($produtos as $produto) {
            $data[] = $produto->nome;
        }

        echo json_encode($data);
    }
    
    
    
    public function duvidas() {           
        $this->template->show('duvidas');
    }
    
    public function eventos() {           
        $this->template->show('eventos');
    }
    
}
