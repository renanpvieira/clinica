<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function idiomaEmpresa(){
        
        $this->db->select('idioma.IdiomaId, Label');
        $this->db->from('idioma_empresa');
        $this->db->join('idioma', 'idioma_empresa.IdiomaId = idioma.IdiomaId');
        $this->db->where('idioma_empresa.EmpresaId', EMPRESAID);
        $this->db->order_by("idioma.IdiomaId", "asc");
        return $this->db->get()->result_array();
        
    }
}
