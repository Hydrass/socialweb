<?php
// $this->output->enable_profiler(TRUE);
  $mensaje = "";

  if(isset($_POST['ws-lg'])){

    $sql = "SELECT * FROM `registrar` WHERE `correo` = ? AND `clave` = ?;";
    // $sql = "SELECT * FROM `usuarios` WHERE `usuario` = ? AND `clave_usuario` = ? AND `privilegio` = 'Moderador';";
    // 202cb962ac59075b964b07152d234b70
    $CI =& get_instance();



    $usuario = $_POST['txtEmail'];
    $clave = $_POST['txtClave'];

      $usuarios = $CI->security->xss_clean($usuario);
      $claves = $CI->security->xss_clean($clave);

     $rs = $CI->db->query($sql, array($usuarios, $claves));
     $rs = $rs->result();

     if(count($rs) > 0){
        $_SESSION['user_user'] = $rs[0];
        if($_SESSION['user_user']);

           redirect('');
 
      }else {
       $mensaje .= "Usuario o clave incorrecta";
      }
  }

?>
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
<body>
<!-- Modal -->
<div class="modal fade" id="crear-box" tabindex="-1" role="dialog" aria-labelledby="#registral-box" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="registral-box">Registrarte</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label class="rapido">Es rápido y fácil.</label>
            <form action="<?php echo base_url('login');?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                         <div class="form-group">
                            <input type="text" class="form-control" name="txtApellido" id="txtApellido" placeholder="Apellido">
                        </div>
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                          <div class="form-group">
                            <input type="tel" class="form-control" name="txtTelefono" id="txtTel" placeholder="Telefono">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                          <div class="form-group">
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="E-Mail">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                         <div class="form-group">
                            <input type="text" class="form-control" name="txtUsuario" id="" placeholder="Nombre Usuaurio">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="txtClave1" id="txtContrasena" placeholder="Confirmar Contraseña">
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" name="bt_registrar">Registrate</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>


<div class="container">
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6 solc-box">
                <div class="nameSocial">
                    <h1>Social Web</h1>
                </div>     

                <div class="sipnoSocial">
                    <h2>Social Web te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</h2>
                </div>
            </div>
            <div class="form-group col-md-6 login-box">
                <div class="form-login">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="txtEmail" class="form-control" id="email" placeholder="Introduce tu E-Mail">
                    </div>
                    <div class="form-group">
                        <label for="clave">Contrasena</label>
                        <input type="password" name="txtClave" class="form-control" id="clave" placeholder="Introduce tu clave">
                    </div>

                    <div class="text-center pt-2">
                        <button class="btn btn-primary btn-lg btn-block" name="ws-lg">Entrar</button>
                    </div>
                    <div class="text-center pt-2">
                        <a href="">¿Has olvidado la contraseña?</a>
                    </div>
                    <hr/>

                    <div class="text-center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear-box">Crear un nuevo Usuario</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $mensaje?>
     </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</body>