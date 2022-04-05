<?php
  include("../Controlador/ProveedControlador.php");

  $obj = new proveedor();
  if($_POST){
    $obj->IdProveedor = $_POST['IdProveedor'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Ciudad = $_POST['Ciudad'];
    $obj->Direccion = $_POST['Direccion'];
    $obj->Descripcion = $_POST['Descripcion'];
    


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