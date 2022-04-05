<?php
  include("../Controlador/ProductoControlador.php");

  $obj = new producto();
  if($_POST){
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->NombreProducto = $_POST['NombreProducto'];
    $obj->ValorProducto = $_POST['ValorProducto'];
    $obj->IdCategorias = $_POST['IdCategorias'];
    $obj->Cantidad = $_POST['Cantidad'];
    $obj->IvaProducto = $_POST['IvaProducto'];
    $obj->TotalProductos = $_POST['TotalProductos'];
    $obj->IdProveedor = $_POST['IdProveedor'];
    $obj->ImagenProducto = $_FILES['ImagenProducto']['name'];
  
    


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