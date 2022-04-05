<?php

include("../controlador/PedidoDetalleControlador.php");
 
$obj = new PedidoDetalle();
if($_POST)
{

$obj->IdPedidoDetalle = $_POST['IdPedidoDetalle'];    
$obj->IdPedido = $_POST['IdPedido'];
$obj->IdProducto = $_POST['IdProducto'];
$obj->ValorUnitario= $_POST['ValorUnitario'];
$obj->Cantidad = $_POST['Cantidad'];
$obj->ValorDetalle= $_POST['ValorDetalle'];
$obj->IvaDetalle = $_POST['IvaDetalle'];
$obj->ValorTotal = $_POST['ValorTotal'];



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
