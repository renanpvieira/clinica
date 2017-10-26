<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function menuEmpresa(){
        $this->db->select('Label, UrlAdmin, Icone');
        $this->db->from('menu_empresa');
        $this->db->join('menu', 'menu_empresa.MenuId = menu.MenuId');
        $this->db->where('menu_empresa.EmpresaId', EMPRESAID);
        return $this->db->get()->result_array();
    }
}
