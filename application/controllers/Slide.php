
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {
    /*
     * pasta imagens / arquivo permitido 
     */ 
    private $URL_PATH = 'imagens/slides/';
    private $ALLOWED_TYPES = 'jpg';
      
        
     /* 
     * funcao lista slide painel 
     */
    public function lista_slide() {
        $this->load->model('slide_model');

        $slide = $this->slide_model->lista_slide();      
               
        for ($i = 0; $i < sizeof( $slide); $i++) {
            $slide[$i]->imagens = $this->slide_model->busca_imagens_slide($slide[$i]->id);             
        }
        
        $data['slide'] =  $slide;       
                
        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/lista_slide', $data);
    }
    
    /*
     * chama view inserir slide
     */
     public function inserir_slide() {
        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/insere_slide', $data);
    }
    
    /*
     * funcao inserir slide
     */
    public function insere_slide() {
        $sucesso = false;
        $this->load->model('slide_model');
        $this->load->library('upload');

        $nome = $this->input->post('nome');
          
        $data['nome'] = $nome;
       
        $id_slide = $this->slide_model->insere_slide($data);

        if ($id_slide != false) {

            $number_of_files_uploaded = count($_FILES['upl_files']['name']);

            for ($i = 0; $i < $number_of_files_uploaded; $i++) {
                $randon = rand(1000, 9999);
                $_FILES['userfile']['name'] = $_FILES['upl_files']['name'][$i];
                $_FILES['userfile']['type'] = $_FILES['upl_files']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $_FILES['upl_files']['error'][$i];
                $_FILES['userfile']['size'] = $_FILES['upl_files']['size'][$i];
                $config = array(
                    'file_name' => $randon . "_" . $id_slide,
                    'allowed_types' => $this->ALLOWED_TYPES,
                    'max_size' => 3000,
                    'overwrite' => FALSE,
                    'upload_path' => $this->URL_PATH,
                );
                $this->upload->initialize($config);
                if ($this->upload->do_upload()) {
                    $data_imagem_slide['id_slide'] = $id_slide;
                    $data_imagem_slide['url_image'] = $this->URL_PATH . $randon . "_" . $id_slide . "." . $this->ALLOWED_TYPES;

                    if ($this->slide_model->inserir_imagem_slide($data_imagem_slide)) {
                        $sucesso = true;
                    }
                }
            }
        }

        if ($sucesso) {
            $retorno['erro'] = "Slide inserido com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/insere_slide', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível inserir slide ou as imagens. " . $this->upload->display_errors() . $id_slide;
            $this->template->showAdmin('admin/insere_slide', $retorno);
        }
    }
    /*
     * chama view editar slides
     * trazendo slides pelo id 
     */
    public function editar_slide() {
        $this->load->model('slide_model');

        $data_buscar['id'] = $this->uri->segment(3); //terceiro parametro da url que esta sendo enviado

        $data['slide'] = $this->slide_model->buscar_slide($data_buscar);
        
        if ($data['slide']['status'] == '0'){
            $data['slide']['status'] = 'Inativo';
        } else{             
            $data['slide']['status'] = 'Ativo';
        }
        
        $data['imagens'] = $this->slide_model->busca_imagens_slide($data_buscar['id']);

        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/editar_slide', $data);
    }
    
    /*
     * funcao editar slide
     */
    public function edita_slide() {
        $this->load->model('slide_model');
        $this->load->library('upload'); 
        $sucesso = false;

        $id = $this->input->post('id');       
        $nome = $this->input->post('nome');            
        $status = $this->input->post('status');
        
        $data['id'] = $id;
        $data['nome'] = $nome;       
        $data['status'] = $status;
        
        $retorno['retorno'] = $this->slide_model->editar_slide($data);

        $this->slide_model->deletar_imagens($id);
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
                $data_imagem_slide['id_slide'] = $id;
                $data_imagem_slide['url_image'] = $this->URL_PATH . $randon . "_" . $nome . "." . $this->ALLOWED_TYPES;

                if ($this->slide_model->inserir_imagem_slide($data_imagem_slide)) {
                    $sucesso = true;
                }
            }
        }

        if ($sucesso) {
            $retorno['erro'] = "slide editado com sucesso!";
            $retorno['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/painel', $retorno);
        } else {
            $retorno['usuario'] = $this->session->userdata('usuario');
            $retorno['erro'] = "Não foi possível editar slide ou as imagens. " . $this->upload->display_errors() . $id;
            $this->template->showAdmin('admin/painel', $retorno);
        }
    }
    
    
   
}