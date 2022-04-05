<?php
 include('../Conexion/conectar.php');
 include("../Modelo/ProveedModelo.php");
?>
<?php
$obj = new proveedor();
if($_POST){
    $obj->IdProveedor = $_POST['IdProveedor'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Ciuadd = $_POST['Ciudad'];
    $obj->Direccion = $_POST['Direccion'];
    $obj->Descripcion = $_POST['Descripcion'];
    
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from proveedor where IdProveedor = '$llave'";
$resultado = mysqli_query($cone,$sql);
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdProveedor = $arreglo[0];
    $obj->Nombre = $arreglo[1];
    $obj->Telefono = $arreglo[2];
    $obj->Ciudad = $arreglo[3];
    $obj->Direccion = $arreglo[4];
    $obj->Descripcion = $arreglo[5];
  
}
else{
    $obj->IdProveedor  = null;
    $obj->Nombre = null;
    $obj->Telefono = null;
    $obj->Ciudad = null;
    $obj->Direccion = null;
    $obj->Descripcion = null;
    
}
?>


<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
         	
        <title>Modulo Proveedor</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="proveedor" method="POST">
            <h4 class=" text-danger font-weight-normal " >Eliminar</h4><br>  
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>
                        <tr>
                            <td>Código</td>
                            <td><input readOnly size="10" type="text" name="IdProveedor" id="IdProveedor" value="<?php echo $obj->IdProveedor?>" placeholder="Código es Automatico"></td>
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre" value="<?php echo $obj->Nombre  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input size="40" type="text" name="Telefono" id="Telefono" value="<?php echo $obj->Telefono  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>Ciudad</td>
                            <td><input size="40" type="text" name="Ciudad" id="Ciudad" value="<?php echo $obj->Ciudad  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td><input size="40" type="text" name="Direccion" id="Direccion" value="<?php echo $obj->Direccion  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>Descripcion</td>
                            <td><input size="40" type="text" name="Descripcion" id="Descripcion" value="<?php echo $obj->Descripcion ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
                                    <a href="Proveedor.php">
                                             <button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>