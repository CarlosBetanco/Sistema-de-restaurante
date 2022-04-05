<?php
 include('../Conexion/conectar.php');
 include("../Modelo/PedidoDetalleModelo.php");
?>
<?php
$obj = new PedidoDetalle();
if($_POST){
    $obj->IdPedidoDetalle = $_POST['IdPedidoDetalle'];
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->ValorUnitario = $_POST['ValorUnitario'];
    $obj->Cantidad = $_POST['Cantidad'];
    $obj->ValorDetalle = $_POST['ValorDetalle'];
    $obj->IvaDetalle = $_POST['IvaDetalle'];
    $obj->ValorTotal = $_POST['ValorToltal'];
    
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from pedido_Detalle where IdPedidoDetalle = '$llave'";
$resultado = mysqli_query($cone,$sql);
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdPedidoDetalle = $arreglo[0];
    $obj->IdPedido = $arreglo[1];
    $obj->IdProducto = $arreglo[2];
    $obj->ValorUnitario = $arreglo[3];
    $obj->Cantidad = $arreglo[4];
    $obj->ValorDetalle = $arreglo[5];
    $obj->IvaDetalle = $arreglo[6];
    $obj->ValorTotal = $arreglo[7];
  
}

else {
    $obj->IdPedidoDetalle = null;
    $obj->IdPedido = null;
    $obj->IdProducto = null;
    $obj->ValorUnitario = null;
    $obj->Cantidad = null;
    $obj->ValorDetalle = null;
    $obj->IvaDetalle = null;
    $obj->ValorTotal = null;
    
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
                       <td style="width:800px" class="text-light" colspan="4">Información del detalle del pedido</td>
                       </tr>
                        <tr>
                            <td>PedidoDetalle</td>
                            <td><input readOnly size="10" type="text" name="IdPedidoDetalle" id="IdPedidoDetalle" value="<?php echo $obj->IdPedidoDetalle?>" placeholder="Código es Automatico"></td>
                            <td>Pedido</td>
                            <td><input size="40" type="text" name="IdPedido" id="IdPedido" value="<?php echo $obj->IdPedido ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>Producto</td>
                            <td><input size="40" type="text" name="IdProducto" id="IdProducto" value="<?php echo $obj->IdProducto  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>ValorUnitario</td>
                            <td><input size="40" type="text" name="ValorUnitario" id="ValorUnitario" value="<?php echo $obj->ValorUnitario  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><input size="40" type="text" name="Cantidad" id="Cantidad" value="<?php echo $obj->Cantidad  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>ValorDetalle</td>
                            <td><input size="40" type="text" name="ValorDetalle" id="ValorDetalle" value="<?php echo $obj->ValorDetalle?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>IvaDetalle</td>
                            <td><input size="40" type="text" name="IvaDetalle" id="IvaDetalle" value="<?php echo $obj->IvaDetalle  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>ValorTotal</td>
                            <td><input size="40" type="text" name="ValorTotal" id="ValorTotal" value="<?php echo $obj->ValorTotal?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
                                    <a href="PedidoDetalle.php">
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