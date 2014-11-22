<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('tbl_categoria', $data);
    }

    function listar() {
        $query = $this->db->get('tbl_categoria');
        return $query->result();
    }

    function editar($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_categoria');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('tbl_categoria');
      
    }

    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_categoria');
    }

}
