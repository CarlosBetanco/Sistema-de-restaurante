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

        <h2 class="form-login-heading">Registro</h2>
        <div class="login-wrap"> 
            <span id="spanlogin" > 
          <input type="text" class="form-control" name="NombreUsuario" placeholder="Nombre" autofocus>
          <br>
          <input type="text" class="form-control" name="Correo" placeholder="Correo">
          <br>
          <input type="password" class="form-control" name="ClaveUsuario" placeholder="Contraseña">
          <br>
          <input type="password" class="form-control" name="ClaveUsuario" placeholder="Confirmar Contraseña">
          <br>
            <button class="btn btn-theme btn-block" href="index.php" name="Ingresar"type="submit">Registrarse</button>
          <br>
          <a href="./RolUsuario.php" class="btn btn-theme btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
          
</form>
          
          
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
