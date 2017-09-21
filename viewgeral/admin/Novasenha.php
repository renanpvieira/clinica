<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>
   
    <link href="<?php echo terceiros_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo terceiros_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo terceiros_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <link href="<?php echo terceiros_url('vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo terceiros_url('build/css/custom.min.css'); ?>" rel="stylesheet">
    <style>
        .no-padding {padding: 0px !important; padding-left:  8px !important; border: none !important; background-color: #F7F7F7 !important; }
        #img-captcha {padding: 0px !important; margin: 0px !important; margin-top: -18px !important;}
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form name="form-novasenha" action="post">
              <h1>Login</h1>
              <div>
                 <img src="<?php echo img_url('logo/' . $empresa['Logo']); ?>" width="80" >
              </div>
              <br />
              <div>
                  <input type="text" name='Login' class="form-control" maxlength="255" placeholder="Login" required="" />
              </div>
              <div class="input-group">
                  <input type="hidden" name="Chave" value="<?php echo $chave; ?>" /> 
                  <input type="text" name='Imagem' maxlength="12" class="form-control" placeholder="Digite o texto da imagem ao lado" required="" />
                  <span class="input-group-addon no-padding" >
                     <img id="img-captcha" src="<?php echo $imagem; ?>" height="38" />
                  </span>
              </div>
              
              <div class="btn-logar">
                <input class="btn btn-default submit" type="submit" value="Enviar" />
              </div>
              <br /><br /><br />
              <div id="nova-msg"></div>
              


              <div class="clearfix"></div>
              <br />

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>© 2017 Todos os direitos reservados wxt sistemas.</p>
                </div>
              </div>
            </form>
              
            
              
              
              
              
              
          </section>
        </div>

        
      </div>
    </div>
    
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script  src="<?php echo nativos_js_url('script.js'); ?>" ></script>
    
    <script>
         function GeraSecurityForm(form){
             form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
             return form;
         }
                  
         function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }
         function Base_Url(url){  return '<?php echo base_url(); ?>' + url; }
    </script>
    
    
    <script  src="<?php echo nativos_js_url('novasenha.js'); ?>" ></script>
     

      
  </body>
</html>
