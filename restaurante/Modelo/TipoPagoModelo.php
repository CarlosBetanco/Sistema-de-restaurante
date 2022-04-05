<?php
include("../Controlador/TipoPagoControlador.php");

$obj = new tipopago();
if($_POST){
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Descripcion_Pago = $_POST['Descripcion_Pago'];
    
}

    
    if(isset($_POST['guarda'])){
            $obj->agregar();
    }

    if(isset($_POST['modifica'])){
        $obj->modificar();
    }

    if(isset($_POST['elimina'])){
        $obj->eliminar();
    }

    ?>