<?php
include("../Controlador/CategoriasControlador.php");

$obj = new Categorias();
if($_POST){
    $obj->IdCategorias = $_POST['IdCategorias'];
    $obj->NombreCategoria = $_POST['NombreCategoria'];
    
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