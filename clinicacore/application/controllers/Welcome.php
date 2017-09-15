<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

        public function __construct()
        {
               parent::__construct();
               $this->load->model('Menu_model', 'menu');
        }	
    
	public function index()
	{
            //$dados['menu'] = $this->menu->menuEmpresa(1);
            //var_dump($res);
            echo CLINICAID;
            $this->displaySite('welcome_message');
	}
}
