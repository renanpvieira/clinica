<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function menuEmpresa($EmpresaId){
        $this->db->select('Label, Url');
        $this->db->from('menu_clinica');
        $this->db->join('menu', 'menu_clinica.MenuId = menu.MenuId');
        $this->db->where('menu_clinica.ClinicaId', $EmpresaId);
        return $this->db->get()->result_array();
    }
}
