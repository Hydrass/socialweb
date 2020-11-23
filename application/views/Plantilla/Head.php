<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assest/stile.css'); ?>" />

  </head>
  <header>
    
<div class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 home-head-color">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="<?php echo base_url(); ?>" class="navbar-brand social_web">SOCIAL WEB</a>
                    </div>

                    <div class="navbar-collapse collapse link-color" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url();?>">Inicio</a></li>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                        <?php $id = 'perfil/'.$_SESSION['user_user']->id_registrar;?>
                            <li><a href="<?php echo base_url($id)?>"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_user']->nombre; ?></a></li>
                            <li><a href="<?php echo base_url($id)?>"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                            <li><a href="<?php echo base_url('cerrar_sesion'); ?>" class="dropdown-toggle" ><span class="glyphicon glyphicon-log-in"></span> Cerrar Session <span class="caret"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  </header>
  <body>
