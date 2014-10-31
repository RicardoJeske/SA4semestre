<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('tbl_usuario', $data);
    }

    function listar() {
        $query = $this->db->get('tbl_usuario');
        return $query->result();
    }

    function editar($id) {
        $this->db->where('idusuario', $id);
        $query = $this->db->get('tbl_usuario');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idusuario', $data['idusuario']);
        $this->db->set($data);
        return $this->db->update('tbl_usuario');
    }

    function deletar($id) {
        $this->db->where('idusuario', $id);
        return $this->db->delete('tbl_usuario');
    }

}
