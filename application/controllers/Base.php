<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Base extends CI_Controller {

    private $IP_WEBSERVICE = "http://189.62.100.24:36730/dc-info/webservice/webservice.asmx?wsdl";

    /**
     * Função index() é chamada sempre que apenas o controller é chamado,
     * Verifica se o usuario está logado, se sim, redireciona
     * para a view sincronizar.php, se não, redireciona par ao controller Login
     */
    public function index() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        $data['usuario'] = $this->session->userdata('usuario');
        $this->template->showAdmin('admin/sincronizar', $data);
    }

    public function sincronizar() {
        $this->load->model('base_model');
        include APPPATH . 'third_party/nusoap/nusoap.php';

        $data = array("select" => "SELECT yCodItm,yNomItm,yPr5Itm,yDisItm FROM Itens WHERE yAtiIna = 1",
            "tabela" => "Itens",
            "localdados" => "",
            "alias" => "");

        try {
            $client = new SoapClient($this->IP_WEBSERVICE);
            $function = 'ComandoSQL'; //ProcuraCodigo, ComandoSQL
            $result = $client->__soapCall($function, array($data));


            $xml = simplexml_load_string($result->ComandoSQLResult);

            $json = json_encode($xml);
            $json = json_decode($json);

            //$data['produtos'] = $json->consultaselect;

            $produtos = $json->consultaselect;

            $sucesso = 0;
            $update = 0;
            foreach ($produtos as $produto) {

                $data_insert['codigo'] = $produto->ycoditm;
                $data_insert['nome'] = $produto->ynomitm;
                $data_insert['preco'] = $produto->ypr5itm;
                $data_insert['catalogo'] = 0;
                if (is_object($produto->ydisitm)) {
                    $data_insert['descricao'] = "";
                } else {
                    $data_insert['descricao'] = $produto->ydisitm;
                }


                if ($this->base_model->inserir($data_insert)) {
                    $sucesso++;
                } else {
                    $update++;
                }
            }

            $data['sucesso'] = $sucesso;
            $data['update'] = $update;



            $data['usuario'] = $this->session->userdata('usuario');
            $this->template->showAdmin('admin/sincronizar', $data);
        } catch (Exception $e) {
            
        }
    }

}
