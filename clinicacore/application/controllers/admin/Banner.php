<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {

        public function __construct()
        {
               parent::__construct();
               $this->paginaSegura();
        }	
    
	public function index()
	{
            echo 'Banner admin';
        }
        
        
        
}
