<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getEmpresa(){
       return $this->db->get_where('empresa', array('Empresaid' => EMPRESAID))->row_array();
    }
    
    public function VerificaUsuario($login){
       return $this->db->get_where('empresa', array('Login' => $login, 'Empresaid' => EMPRESAID))->result_array();
    }
}
