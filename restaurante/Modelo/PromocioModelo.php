<?php
  include("../Controlador/PromoControla.php");

  $obj = new promocion();
  if($_POST){
    $obj->IdPromocion = $_POST['IdPromocion'];
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Detalle = $_POST['Detalle'];
    $obj->Fecha_Inicio = $_POST['Fecha_Inicio'];
    $obj->Fecha_Fin = $_POST['Fecha_Fin'];
    $obj->ValorPromocion = $_POST['ValorPromocion'];
   


      if(isset ($_POST['guardar'])){
                $obj->agregar();
      }

      if(isset($_POST['modificar'])){
        $obj->agregar();
      }

        if(isset($_POST['eliminar'])){
            $obj->agregar();

        }
  }
 
?>