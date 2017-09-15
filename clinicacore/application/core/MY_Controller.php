<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
        }
        
        public function paginaSegura(){
            
            
        }
        
        public function displaySite($view)
        {
            $this->load->view(VIEWFOLDER . $view);
        }
        
        public function displayAdmin($view)
        {
            $this->load->view('admin/' . $view);
        }
    
        
        
	
}
