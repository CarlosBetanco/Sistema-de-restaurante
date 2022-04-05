<?php
        
session_start();
//error_reporting(0);
include("../Conexion/conectar.php");  

  $NombreUsuario=$_POST['NombreUsuario'];
  $ClaveUsuario=$_POST['ClaveUsuario'];
  echo"llegue";
  echo $NombreUsuario;
  $c = new Conexion();
  $con=$c->conectando();

  $_SESSION['NombreUsuario']=$NombreUsuario;
  $consulta="SELECT * FROM usuarios where NombreUsuario='$NombreUsuario' AND ClaveUsuario='$ClaveUsuario'";
  $resultado=mysqli_query($con,$consulta); 

  $Filas=mysqli_num_rows($resultado);
  if($Filas>0){
      header('location:../index.php');
  
  
}else{
  echo'<script type="text/javascript">
  alert("Usuario y clave no existen");
  window.location.href="../login.php";
  </script>'; 
}

?>
<h1>Comprueba los campos</h1>
<?php

mysqli_free_result($resultado);
mysqli_close($con);
