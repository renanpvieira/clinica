<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nova extends MY_Controller {
    
    
        private $capt = Array(
            1 => array('95inb' => 'img001.jpg'),        2 => array('zonwj' => 'img002.jpg'),
            3 => array('qa8uf' => 'img003.jpg'),        4 => array('eduzt' => 'img004.jpg'),
            5 => array('jnjd5' => 'img005.jpg'),        6 => array('ndtf9' => 'img006.jpg'),
            7 => array('tza3p' => 'img007.jpg'),        8 => array('8i3qs' => 'img008.jpg'),
            9 => array('bdpkr' => 'img009.jpg'),        10 => array('9lup6' => 'img010.jpg'),
            11 => array('ihpkh' => 'img011.jpg'),        12 => array('cijjx' => 'img012.jpg'),
            13 => array('qqnlp' => 'img013.jpg'),        14 => array('nk7d4' => 'img014.jpg'),
            15 => array('xt17y' => 'img015.jpg'),        16 => array('748em' => 'img016.jpg'),
            17 => array('ak8lw' => 'img017.jpg'),        18 => array('7pfq7' => 'img018.jpg'),
            19 => array('m2vkl' => 'img019.jpg'),        20 => array('iulit' => 'img020.jpg'),
            21 => array('fs9md' => 'img021.jpg'),        22 => array('8hvir' => 'img022.jpg'),
            23 => array('7uvw2' => 'img023.jpg'),        24 => array('p3qzb' => 'img024.jpg'),
            25 => array('unptd' => 'img025.jpg'),        26 => array('c594n' => 'img026.jpg'),
            27 => array('r3bm8' => 'img027.jpg'),        28 => array('xp8x2' => 'img028.jpg'),
            29 => array('jbc5z' => 'img029.jpg'),        30 => array('6g275' => 'img030.jpg'),
            31 => array('ka9n7' => 'img031.jpg'),        32 => array('qk98h' => 'img032.jpg'),
            33 => array('kbfdk' => 'img033.jpg'),        34 => array('lg8qu' => 'img034.jpg'),
            35 => array('5xxmp' => 'img035.jpg'),        36 => array('qldvp' => 'img036.jpg'),        
            37 => array('s3izw' => 'img037.jpg'),        38 => array('945lb' => 'img038.jpg'),
            39 => array('468l3' => 'img039.jpg'),        40 => array('7f2m3' => 'img040.jpg')
        );
        
        private function chaveImagem(){
            $rand = rand (1, count($this->capt));
            $chave = key($this->capt[$rand]);
            $imagedata = 'data:image/jpg;base64,' . base64_encode(file_get_contents('../viewgeral/assets/imagens/captcha/' . $this->capt[$rand][$chave]));
            return array('chave' => $this->encryption->encrypt($chave), 'imagem' => $imagedata);
        }
    

        public function __construct()
        {
           parent::__construct();
           $this->load->model('Empresa_model', 'empresa');
        }	
    
	public function index()
	{
           $ret = $this->chaveImagem();
           $dados['empresa'] = $this->empresa->getEmpresa();
           $dados['chave'] = $ret['chave'];
           $dados['imagem'] = $ret['imagem'];
           $this->load->view('admin/novasenha', $dados);
             
        }
        
       
        
        
        public function novasenha()
        {
             $post = $this->input->post();
             $this->form_validation->set_rules('Login', 'Login', 'trim|required|min_length[6]|max_length[255]|valid_email');
             $this->form_validation->set_rules('Imagem', 'Imagem', 'trim|required|min_length[3]|max_length[8]|alpha_numeric');
             if ($this->form_validation->run())
             {
                if($post['Imagem'] == strtolower($this->encryption->decrypt($post['Chave'])))
                {
                    $res = $this->empresa->VerificaUsuario($post['Login']);
                    if(count($res) == 1){
                       /*
                        * ENVIAR E-MAIL
                        */
                        
                      $ret = $this->chaveImagem(); /* ESTOU COLOCANDO NO TRUE TB PARA EVITAR Q UM ROBO FIQUE MANDANDO E_MAIL */
                      $this->MypostResult(TRUE, "<p>Acabamos de enviar para seu email de cadastro as instruções para troca de senha!</p>", $ret['imagem'], $ret['chave']); 
                    }else{
                        $ret = $this->chaveImagem();
                        $this->MypostResult(FALSE, "<p>Usuário não encontrado!</p>", $ret['imagem'], $ret['chave']); 
                    }    
                }else{
                    $ret = $this->chaveImagem();
                    $this->MypostResult(FALSE, "<p>Você precisa digitar o texto que está na imagem corretamente!</p>", $ret['imagem'], $ret['chave']); 
                }
             }else{
                $ret = $this->chaveImagem();
                $this->MypostResult(FALSE, validation_errors(), $ret['imagem'], $ret['chave']); 
             }
        }
        
        private function MypostResult($formValidate, $msg, $img, $chave){
          echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'imagem' => $img, 'chave' => $chave));
        }
        
        
        
        
}
