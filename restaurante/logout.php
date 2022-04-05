<?php
session_start();
//session_unset();
session_destroy();
echo "se cerro la sesion";
header("Location:./RolUsuario.php");
?>