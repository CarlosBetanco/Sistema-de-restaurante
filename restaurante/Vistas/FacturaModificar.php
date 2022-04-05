<?php
 include("../Conexion/conectar.php");
 include("../Modelo/FacturaModelo.php");
?>
<?php
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
    
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from factura where IdFactura ='$llave'";
$resultado =mysqli_query($cone,$sql);
$arreglo =mysqli_fetch_row($resultado);
    $obj->IdFactura= $arreglo[0];
    $obj->IdPedido= $arreglo[1];
    $obj->IdTipoPago= $arreglo[2];
    $obj->Fecha= $arreglo[3];
    $obj->CostEnvio= $arreglo[4];
     $obj->IvaFactura= $arreglo[5];
    $obj->ValorFactura= $arreglo[6];

    ?>
    <?php
    $c = new Conexion();
    $cone = $c->conectando();
    $p1 = "select * from pedidos";
    $res1 = mysqli_query($cone,$p1);
    $arreglo1 = mysqli_fetch_assoc($res1);
    
   
    $sql2 = "select * from tipopago";
    $res2 = mysqli_query($cone,$sql2);
    $resultado2 = mysqli_fetch_assoc($res2);
    
    



?>


<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
       
         	
        <title>Editar Factura</title>
    </head>
    <br>
    <br>
    <body>
        <center>
         
            <form action="" name="factura" method="POST">
            <h4 class=" text-danger font-weight-normal " >Modificar Factura</h4><br>  
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>   
                        <tr>
                            <td>IdFactura</td>
                            <td><input  readOnly size="10" type="text"  name="IdFactura" id="IdFactura" value="<?php echo $obj->IdFactura?>" placeholder="Código es Automatico"></td>
                            <td class="arreglo" style="width:80">Pedidos</td>
                            <td class="arreglo">
                       
                        <select name="IdPedido" id="$obj->IdPedido">
                                    
                        <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p2 = "select FechaPedido from pedidos where IdPedido='$obj->IdPedido'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[0];
                            ?>  

                                        <?php
                                            do{
                                                $codigo = $arreglo1['IdPedido'];
                                                $nombre = $arreglo1['FechaPedido'];
                                                if($codigo == $obj->IdPedido){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($arreglo1 = mysqli_fetch_assoc($res1));

									        $row = mysqli_num_rows($res1);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($arreglo1 ,0);
										            $arreglo1 = mysqli_fetch_assoc($res1);
									                }


                                        ?>
                                     
                                </select>   
                    </td>    



                        </tr>
                        <tr>
                        <td class="arreglo">TipoPago</td>
                        <td>
                        
                        <select name="IdTipoPago" id="$obj->IdTipoPago">
                                     
                        <?php 
                            $c = new Conexion();
                            $cone = $c->conectando();
                            $p2 = "select Descripcion_Pago from tipopago where IdTipoPago='$obj->IdTipoPago'";
                            $res2 = mysqli_query($cone,$p2);
                            $arreglo2 = mysqli_fetch_row($res2);
                            echo $arreglo2[0];
                            ?> 
                                   
                                        <?php
                                            do{
                                                $codigo = $resultado2['IdTipoPago'];
                                                $nombre = $resultado2['Descripcion_Pago'];
                                                if($codigo == $obj->IdTipoPago){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($resultado2 = mysqli_fetch_assoc($res2));

									        $row = mysqli_num_rows($res2);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($resultado2 ,0);
										            $resultado2 = mysqli_fetch_assoc($res2);
									                }


                                        ?>
                                     
                                </select>   
                                  </td>
                            <td>Fecha</td>
                            <td><input size="40" type="datetime" name="Fecha" id="Fecha" value="<?php echo $obj->Fecha  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>CostEnvio</td>
                            <td><input size="40" type="int" name="CostEnvio" id="CostEnvio"  value="<?php echo $obj->CostEnvio ?>" placeholder="Digite la Categorias"></td>
                            <td>Iva</td>
                            <td><input size="40" type="int" name="IvaFactura" id="IvaFactura"  value="<?php echo $obj->IvaFactura ?>" placeholder="Digite la Categorias"></td>
                        </tr>
                        <tr>
                            <td>ValorFactura</td>
                            <td><input size="10" type="int" name="ValorFactura" id="ValorFactura" value="<?php echo $obj->ValorFactura?>" placeholder="Código es Automatico"></td>
                        </tr>
                        
                                   

                       
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="Factura.php">
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