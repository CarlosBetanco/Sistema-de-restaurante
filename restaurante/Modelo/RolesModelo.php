<?php

include("../Controlador/RolesControlador.php");
 
$obj = new Roles();
if($_POST)
{
    
$obj->IdTipoDocumento = $_POST['IdRol'];
$obj->Descripcion = $_POST['NombreRol'];




}
if(isset($_POST['guarda']))
{

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
