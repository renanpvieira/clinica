<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculo extends MY_Controller {

        public function __construct()
        {
               parent::__construct();
               $this->paginaSegura();
        }	
    
	public function index()
	{
            echo 'Curriculo admin';
        }
        
        
        
}
