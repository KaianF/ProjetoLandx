<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesModel extends CI_Model{

    public function getClientes(){
        $query = $this->db->get('clientes');
        return $query->result();
    }
}