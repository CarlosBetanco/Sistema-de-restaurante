<?php

include("../controlador/PedidosControlador.php");
 
$obj = new Pedidos();
if($_POST)
{
    
$obj->IdPedido = $_POST['IdPedido'];
$obj->FechaPedido = $_POST['FechaPedido'];
$obj->HoraPedido = $_POST['HoraPedido'];
$obj->IdCliente = $_POST['IdCliente'];
$obj->IvaPedido = $_POST['IvaPedido'];
$obj->TotalPedido = $_POST['TotalPedido'];


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
