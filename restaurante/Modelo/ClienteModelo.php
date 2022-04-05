<?php

include("../Controlador/ClienteControlador.php");
 
$obj = new Cliente();
if($_POST)
{
    
    $obj->IdCliente = $_POST['IdCliente'];
    $obj->TipoDocumento = $_POST['TipoDocumento'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Apellido = $_POST['Apellido'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Correo = $_POST['Correo'];
   


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
