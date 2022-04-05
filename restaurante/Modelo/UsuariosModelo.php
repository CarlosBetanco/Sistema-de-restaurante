<?php

include("../Controlador/UsuariosControlador.php");
 
$obj = new Usuarios();
if($_POST)
{
    
    $obj->NombreUsuario = $_POST['NombreUsuario'];
    $obj->ClaveUsuario = $_POST['ClaveUsuario'];
    $obj->IdRol = $_POST['IdRol'];
    $obj->ImagenUsuario = $_FILES['ImagenUsuario']['name'];

}
if(isset($_POST['guarda']))
{
    echo"guarda";
    $obj->agregar();

}
if(isset($_POST['modifica']))
{
$obj->modificar();
}

if(isset($_POST['elimina']))
{
$obj->eliminar();
}

if(isset($_POST['nuevo']))
{
$obj->limpiar();
}

?>
