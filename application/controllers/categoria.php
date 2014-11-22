<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('categoria_model');
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Pessoas";
        $this->load->helper('form');
        $data['categoria'] = $this->categoria_model->listar();
        $this->load->view('categoria_view.php', $data);
    }

    function inserir() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('nome', 'Nome', '');
        $this->form_validation->set_rules('descricao', 'Descrição', '');
       
        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['descricao'] = $this->input->post('descricao');
           

            /* Chama a função inserir do modelo */
            if ($this->categoria_model->inserir($data)) {
                header('location: categoria');
            } else {
                log_message('error', 'Erro ao inserir a pessoa.');
            }
        }
    }

    function editar($id) {

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "CRUD com CodeIgniter | Editar Pessoa";

        /* Carrega o modelo */
        $this->load->model('categoria_model');

        /* Busca os dados da pessoa que será editada (id) */
        $data['dados_categoria'] = $this->categoria_model->editar($id);

        /* Carrega a página de edição com os dados da pessoa */
        $this->load->view('categoria_edit', $data);
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
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => ''
            ),
            array(
                'field' => 'descricao',
                'label' => 'Descrição',
                'rules' => ''
            )
        );
        $this->form_validation->set_rules($validations);
        
        


        /* Executa a validação... */
        if ($this->form_validation->run() === FALSE) {
            /* Caso houver erro chama função editar do controlador novamente */
            $this->editar($this->input->post('id'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['id'] = $this->input->post('id');
            $data['nome'] = ucwords($this->input->post('nome'));
            $data['descricao'] = ucwords($this->input->post('descricao'));
            
            
            
            /* Carrega o modelo */
            $this->load->model('categoria_model');

            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->categoria_model->atualizar($data)) {
                /* Caso sucesso ao atualizar, recarrega a página principal */
               
                
               
                redirect('categoria');
            } else {
                /* Senão exibe a mensagem de erro */
                log_message('error', 'Erro ao atualizar a pessoa.');
            }
        }
    }

    function deletar($id) {

        /* Carrega o modelo */
        $this->load->model('categoria_model');

        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        if ($this->categoria_model->deletar($id)) {
            /* Caso sucesso ao atualizar, recarrega a página principal */
            redirect('categoria');
        } else {
            /* Senão exibe a mensagem de erro */
            log_message('error', 'Erro ao deletar a pessoa.');
        }
    }

}
