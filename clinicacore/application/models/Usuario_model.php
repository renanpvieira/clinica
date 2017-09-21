<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
   public function UsuarioLogin($login){
       return $this->db->get_where('usuario', array('Login' => $login, 'EmpresaId' => EMPRESAID))->result_array();
    }
    
    
}
