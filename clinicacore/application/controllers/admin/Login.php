<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

        public function __construct()
        {
           parent::__construct();
           $this->load->model('Empresa_model', 'empresa');
           $this->load->model('Usuario_model', 'usuario');
        }	
    
	public function index()
	{
           $dados['empresa'] = $this->empresa->getEmpresa();
           $this->load->view('admin/login', $dados);
        }
        
        public function logar()
        {
             $post = $this->input->post();
             $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
             $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[6]|max_length[12]');
             if ($this->form_validation->run())
             {
                 $res = $this->usuario->UsuarioLogin($post['Login']);
                 if(count($res) == 1){
                     if($post['Senha'] == $this->encryption->decrypt($res[0]['Senha'])){ // Digito a senha certa
                         if($res[0]['Estatus'] == 1){
                           $this->session->set_userdata($this->sessao, $this->encryption->encrypt(json_encode($res[0])));
                           $this->postResult(TRUE, "", site_url("/admin/home"));
                         }else{
                           $this->postResult(FALSE, "<p>Esse Usuário não está mais ativo!</p>");
                         }
                     }else{
                        $this->postResult(FALSE, "<p>Senha incorreta!</p>");
                     }
                 }else{
                     $this->postResult(FALSE, "<p>Usuário não encontrado!</p>"); // sem acento por causa do json
                 }
             }else{
               $this->postResult(FALSE, validation_errors());
             }
        }
        
        
}
