<?php
include("../Controlador/FacturaControlador.php");

$obj = new Factura();
if($_POST){
    $obj->IdFactura = $_POST['IdFactura'];
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Fecha= $_POST['Fecha'];
    $obj->CostEnvio = $_POST['CostEnvio'];
    $obj->IvaFactura = $_POST['IvaFactura'];
    $obj->ValorFactura = $_POST['ValorFactura'];
   
}


    if(isset($_POST['guarda'])){
            $obj->generar();
    }

    if(isset($_POST['modifica'])){
        $obj->editar();
    }

    if(isset($_POST['elimina'])){
        $obj->cancelar();
    }
 ?>