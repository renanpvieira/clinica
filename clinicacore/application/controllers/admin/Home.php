<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

        public function __construct()
        {
               parent::__construct();
               $this->paginaSegura();
               
               
        }	
    
	public function index()
	{
           $this->displayAdmin('home');
         }
        
        
        public function sair(){
           $this->deslogar();
           redirect('admin/home');
        }
        
        
        
}
