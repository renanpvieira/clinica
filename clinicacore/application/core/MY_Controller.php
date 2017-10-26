<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
        public $sessao =  '';
        private $login_url = '';
        private $dados = Array();

        public function __construct()
        {
            parent::__construct();
            $this->dados = Array();
            $this->sessao = 'site_proj';
            $this->login_url = site_url('admin/login');
            
            $this->load->model('Menu_model', 'menu');
            $this->load->model('Idioma_model', 'idioma');
            $this->load->model('Empresa_model', 'empresa');
            $this->load->model('Alerta_model', 'alerta');
        }
        
        public function SetScript($s)
        {
            $this->dados['scriptsJs'] = $s;
        }
        
        public function SetDados($key, $d)
        {
            $this->dados[$key] = $d;
        }
        
        public function paginaSegura(){
            if(!$this->session->has_userdata($this->sessao))
            {
                redirect($this->login_url);
            }
        }
        
        public function displaySite($view)
        {
            $this->load->view(VIEWFOLDER . $view);
        }
        
        
        
        public function displayAdmin($view)
        {
            
            /* DADOS DEFAULT ADMIN */
            $this->SetDados('nomeusuario', $this->getUsuarioNome());
            $this->SetDados('menu', $this->menu->menuEmpresa());
            $this->SetDados('alertas', $this->alerta->AlertasNaoVistos());
            $this->SetDados('idiomas', $this->idioma->idiomaEmpresa());
            
            //var_dump($this->dados);
            //exit();
            
            $this->load->view('admin/topo', $this->dados);
            $this->load->view('admin/' . $view);
            $this->load->view('admin/base');
            
            $this->dados = array(); /* Limpando */
        }
    
        public function postResult($formValidate, $msg, $url = NULL){
            echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'url' => $url));
        }
        
        public function deslogar(){
            $this->session->unset_userdata($this->sessao);
        }
        
        public function getUsuarioNome(){
            if(!$this->session->has_userdata($this->sessao)){
                redirect($this->login_url);
            }else{
                $sessao = json_decode($this->encryption->decrypt($this->session->userdata($this->sessao)), True);
                return $sessao['Nome'];
            }
        }

        
	
}
