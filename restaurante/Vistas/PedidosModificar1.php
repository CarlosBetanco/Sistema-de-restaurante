<?php
 include("../Conexion/conectar.php");
 include("../Modelo/PedidosModelo.php");
?>
<?php
$obj = new Pedidos();
if($_POST){
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->FechaPedido = $_POST['FechaPedido'];
    $obj->HoraPedido = $_POST['HoraPedido'];
    $obj->IdCliente = $_POST['IdCliente'];
    $obj->IvaPedido = $_POST['IvaPedido'];
    $obj->TotalPedido = $_POST['TotalPedido']; 
}
    
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from pedidos where IdPedido ='$llave'";
$resultado =mysqli_query($cone,$sql);
$arreglo =mysqli_fetch_row($resultado);
    $obj->IdPedido= $arreglo[0];
    $obj->FechaPedido= $arreglo[1];
    $obj->HoraPedido= $arreglo[2];
    $obj->IdCliente= $arreglo[3];
    $obj->IvaPedido= $arreglo[4];
    $obj->TotalPedido= $arreglo[5];
?>
<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="ciudad.css">
 
       
         	
        <title>Modulo Pedidos</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipopago" method="POST">
            <h4 class=" text-danger font-weight-normal " >Modificar</h4><br> 
                <table class="table-bordered">
                       <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>Codigo</td>
                            <td><input readOnly size="10" type="text" name="IdPedido" id="IdPedido" value="<?php echo $obj->IdPedido?>" placeholder="Código es Automatico"></td>
                    
                            <td>Fecha de pedido</td>
                            <td><input size="40" type="text" name="FechaPedido" id="FechaPedido" value="<?php echo $obj->FechaPedido ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>HoraPedido</td>
                            <td><input size="40" type="text" name="HoraPedido" id="HoraPedido" value="<?php echo $obj->HoraPedido ?>" placeholder="Nombre de la Carretera"></td>
                
                        
                        <td class="arreglo" style="width:100">Clientes</td>
                    <td class="arreglo">
                        <select name="idCliente" id="$obj->idCliente">
                                 <option>[Seleccione El Cliente]</option>
                                   
                                        <?php
                                            do{
                                                $codigo = $resultado4['IdCliente'];
                                                $nombre = $resultado4['Nombre'];
                                                $apellido = $resultado4['Apellido'];
                                                if($codigo == $obj->IdCliente){
                                                    echo "<option value=$codigo=>$nombre $apellido";
                                                }else{
                                                    echo "<option value=$codigo>$nombre $apellido";
                                                }
                                            }while($resultado4 = mysqli_fetch_assoc($rs4));

									        $row4 = mysqli_num_rows($rs4);
									        $rows4=0;
									        if($rows4>0)
									                {
										            mysqli_data_seek($resultado4 ,0);
										            $resultado4 = mysqli_fetch_assoc($rs4);
									                }


                                        ?>
                                     
                                </select>   
                
                </td>
                        </tr>

                        <tr>
                            <td>Iva</td>
                            <td><input size="40" type="text" name="IvaPedido" id="IvaPedido" value="<?php echo $obj->IvaPedido ?>" placeholder="Iva"></td>
                       
                            <td>Total</td>
                            <td><input size="40" type="text" name="TotalPedido" id="TotalPedido" value="<?php echo $obj->TotalPedido ?>" placeholder="Total"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="Pedidos1.php">
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