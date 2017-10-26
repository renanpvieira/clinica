<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo terceiros_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="<?php echo terceiros_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    
    <!-- NProgress -->
    <link href="<?php echo terceiros_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo terceiros_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <!-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $nomeusuario; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <?php
                       foreach ($menu as $m) {
                            echo '<li><a href="' . site_url($m['UrlAdmin']) . '"><i class="' . $m['Icone'] . '"></i>' . $m['Label'] . '</a></li>';
                        }
                    ?>
                   
                    
                  <!--  
                     <li><a href="<?php /* echo site_url('admin/empresa');*/ ?>"><i class="fa fa-edit"></i>Empresa</a></li>
                     <li><a><i class="fa fa-map-marker"></i>Localização</a></li>
                     <li><a><i class="fa fa-phone"></i>Contatos</a></li>
                     <li><a><i class="fa fa-user-md"></i>Serviços</a></li>
                     <li><a><i class="fa fa-home"></i>Instalações</a></li>
                     <li><a><i class="fa fa-user-md"></i>Profissionais</a></li>
                     <li><a><i class="fa fa-plus-square"></i>Planos de Saúde</a></li>
                     <li><a><i class="fa fa-photo"></i>Álbum de Fotos</a></li>
                     <li><a><i class="fa fa-bullhorn"></i>Notícias</a></li>
                  <li><a><i class="fa fa-bell"></i>Dicas</a></li>
                  <li><a><i class="fa fa-bell"></i>Banners</a></li>
                  <li><a><i class="fa fa-comments-o"></i>Mensagens Recebidas</a></li>
                  <li><a><i class="fa fa-file-excel-o"></i>Currículos Recebidas</a></li>
                  -->
                </ul>
              </div>
            </div>
            
            
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $nomeusuario; ?> <span class=" fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url('admin/home/sair'); ?>"> Configurações</a></li>
                    <li><a href="<?php echo site_url('admin/home/sair'); ?>"> Usuários</a></li>
                    <li><a href="<?php echo site_url('admin/home/sair'); ?>"> Ajuda</a></li>
                    <li><a href="<?php echo site_url('admin/home/sair'); ?>"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>
                
                <?php
                   if(count($alertas) >= 1){
                       echo '<li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-envelope-o"></i>
                                  <span class="badge bg-green">' . count($alertas) . '</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">' ;
                       
                            foreach ($alertas as $alerta) {
                                    echo '<li>
                                            <a>
                                              <span>
                                                <span>'. $alerta['DataAlertaFormatado'] .'</span>
                                              </span>
                                              <span class="message">'. $alerta['Texto'] .'</span>
                                            </a>
                                          </li>';
                                }
                        echo  '<li>
                                    <div class="text-center">
                                      <a href="' . site_url('admin/alerta') . '">
                                        <strong>Ver todos alertas</strong>
                                        <i class="fa fa-angle-right"></i>
                                      </a>
                                    </div>
                                  </li>
                                </ul>
                              </li>';
                   }
                ?>
                
                

                
                
                
                
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">