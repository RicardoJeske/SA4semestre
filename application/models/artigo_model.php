<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artigo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('tbl_artigo', $data);
    }

    function listar() {
        $query = $this->db->get('tbl_artigo');
        return $query->result();
    }

    function editar($id) {
        $this->db->where('idartigo', $id);
        $query = $this->db->get('tbl_artigo');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idartigo', $data['idartigo']);
        $this->db->set($data);
        return $this->db->update('tbl_artigo');
    }

    function deletar($id) {
        $this->db->where('idartigo', $id);
        return $this->db->delete('tbl_artigo');
    }

}
