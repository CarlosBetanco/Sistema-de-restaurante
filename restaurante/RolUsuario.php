<!DOCTYPE html>
<html lang="en"> 

<head>
<?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Iniciar Sesion</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <br>
    <div align="center"><font style="color:gold;  font-size:50px; font-family:fantasy;">Administracion</font></div>
    <div class="container">
      <form class="form-login" action="Vistas/validar.php" method="POST">

        <h2 class="form-login-heading">Sistema de acministracion de restaurante</h2>
        <br>
        <p style="text-align: center;">Acceda según el tipo de usuario registrado</p>

        <div class="login-wrap"> 
            <span id="spanlogin" > 

            <div class="col-xs-6">
                <form action="./login.php" method="post">
                <button type="submit" class="btn btn-primary btn-block btn-flat">EMPLEADO</button>
                </form>
              </div>
              <div class="col-xs-6">
                <form action="./login.php" method="post">
                <button type="submit" class="btn btn-primary btn-block btn-flat">ADMINISTRADOR</button>
                </form>
              </div> 
              <hr>  
</form>


          <div class="registration">
            Tovia no te has registrado?<br/>
            <a class="" href="../restaurante/Registro.php">
              Registrate aqui
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Has olvidado tu contraseña ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("https://cloudfront-us-east-1.images.arcpublishing.com/semana/M3V3MNCND5H7ZEO2TFMQBWCRWY.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
