<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

    public function index() {
        $this->load->view('ajaxsearch');
    }
    
    public function Search() {//estava na controller painel, "sem uso no momento"
        $this->load->view('admin/ajaxsearch');
    }
    //inicio funcao do ajax live search
    public function autocomplete() {
        // load model
        $this->load->model('ajaxsearch_model');

        $search_data = $this->input->post('search_data');

        $result = $this->ajaxsearch_model->get_autocomplete($search_data);

        // set text compatible IE7, IE8        
        header('Content-type: text/plain');
        // set json non IE        
        header('Content-type: application/json');


        if (!empty($result)) {
            echo json_encode($result);
        } else {
            echo json_encode([]);
        }
    }//FIM funcao live seach

}
