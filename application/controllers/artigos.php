<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artigos extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('artigo_model');
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Artigos";
        $data['artigos'] = $this->artigo_model->listar();
        $this->load->view('artigo_view.php', $data);
    }

    function inserir() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('titulo', 'Titulo', '');
        $this->form_validation->set_rules('corpo', 'Corpo', '');
        //$this->form_validation->set_rules('data', 'Data', '');
        

        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['titulo'] = $this->input->post('titulo');
            $data['corpo'] = $this->input->post('corpo');
            $data['data'] = $this->input->post('data');

            /* Carrega o modelo */
            $this->load->model('artigo_model');

            /* Chama a função inserir do modelo */
            if ($this->artigo_model->inserir($data)) {
                redirect('artigos');
            } else {
                log_message('error', 'Erro ao inserir o artigo.');
            }
        }
    }

    function editar($id) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Artigo";

        /* Carrega o modelo */
        $this->load->model('artigo_model');

        /* Busca os dados da pessoa que será editada (id) */
        $data['dados_artigo'] = $this->artigo_model->editar($id);
        
        /* Carrega a página de edição com os dados da pessoa */
        $this->load->view('artigo_edit', $data);
    }

    function atualizar() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'titulo',
                'label' => 'Titulo',
                'rules' => ''
            ),
            array(
                'field' => 'corpo',
                'label' => 'Corpo',
                'rules' => ''
            ),
            array(
                'field' => 'data',
                'label' => 'Data',
                'rules' => ''
            ));
        $this->form_validation->set_rules($validations);

        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('idartigo'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['idartigo'] = $this->input->post('idartigo');
            $data['titulo'] = ucwords($this->input->post('titulo'));
            $data['corpo'] = strtolower($this->input->post('corpo'));
            $data['data'] = strtolower($this->input->post('data'));
            

            /* Carrega o modelo */
            $this->load->model('artigo_model');

            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->artigo_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
                redirect('artigos');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar o artigo.');
            }
        }
    }

    function deletar($id) {

        /* Carrega o modelo */
        $this->load->model('artigo_model');

        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        if ($this->artigo_model->deletar($id)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('artigos');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar o artigo.');
        }
    }

}
