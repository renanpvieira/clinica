<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        public function __construct()
        {
               parent::__construct();
               $this->load->model('Menu_model', 'menu');
        }	
    
	public function index()
	{
            $dados['menu'] = $this->menu->menuEmpresa(1);
            //var_dump($res);
            echo CLINICAID;
            $this->load->view('welcome_message', $dados);
	}
}
