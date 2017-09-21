<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alerta_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
   public function AlertasNaoVistos(){
       $this->db->select('*, DATE_FORMAT(DataAlerta, "%d/%m/%Y %h:%m:%s") as DataAlertaFormatado');
       $this->db->from('alerta');
       $this->db->where('EmpresaId', EMPRESAID);
       $this->db->where('UsuarioId', 0);
       $this->db->order_by('DataAlerta', 'DESC');
       $this->db->limit(6); 
       return $this->db->get()->result_array();
    }
    
    public function AlertasTodos(){
       $this->db->select('*, DATE_FORMAT(DataAlerta, "%d/%m/%Y %h:%m:%s") as DataAlertaFormatado');
       $this->db->from('alerta');
       $this->db->where('EmpresaId', EMPRESAID);
       $this->db->order_by('DataAlerta', 'DESC');
       return $this->db->get()->result_array();
    }
    
    
}
