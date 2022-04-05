<?php
include("../Conexion/conectar.php");
include("../Modelo/FacturaModelo.php");
$obj = new Factura();
if($_POST)
{
    $obj->IdFactura = $_POST['IdFactura'];
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Fecha= $_POST['Fecha'];
    $obj->CostEnvio = $_POST['CostEnvio'];
    $obj->IvaFactura = $_POST['IvaFactura'];
    $obj->ValorFactura = $_POST['ValorFactura'];
  

}
$llave = $_GET['key'];
 echo $llave;
 $obj->idPedidos = $llave;
/*$c = new Conexion();
$cone = $c->conectando();	
$sql = "select * from factura where IdPedidos= '$llave'  ";
$rs1 = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($rs1);
    $obj->IdFactura = $arreglo[0] ;
    $obj->IdPedido = $arreglo[2];
    $obj->IdTipoPago = $arreglo[1];
    $obj->Fecha = $arreglo[1];
    $obj->CostEnvio = $arreglo[1];
    $obj->ivaFactura = $arreglo[3];
    $obj->valorFactura = $arreglo[4];
 */   
$c = new Conexion();
$cone = $c->conectando();	
$sql = "select cliente.Nombre, cliente.Apellido, cliente.TipoDocumento, cliente.IdCliente, cliente.Telefono from cliente INNER JOIN pedidos on pedidos.IdCliente = cliente.IdCliente where pedidos.IdPedido='$llave'  ";
$rs1 = mysqli_query($cone,$sql);
$arreglo2 = mysqli_fetch_array($rs1);


?> 

<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">	
        <link rel="stylesheet" href="css/julios2.css">
        <script src="js/validate2.js"></script> 
        <title>Modulo Administrativo</title>
       
    </head>
    <body>
    
        <br>
        <br>
        <center>
       
        <?php 
        sleep(1);
         ?>
        
        
      
        <form action="" name="proveedores" id="proveedores" method="POST">
         <table id="imprime" class="table-bordered" style="width:900px">
            <tr>
                <td class="arreglo" style="width:400">
                    
                        <img src="../imagenes/logo.jpg" alt="">
                </td>    
                <td class="arreglo" style="width:400">    
                        <center>
                        Empresa S.A.S
                        <br>
                        999.999.999-0
                        <br>
                        Cra 11 No.30b-50 Ibagué - Tel:2650026
                        <br>
                        Pedro_hernanz@gmail.com
                        <br>
                        Resolucion Dian: 0000000000
                        <br>
                        Autorizada el:01/01/2001
                        <br>
                        Prefijo  POS Del: 1 - 1000000
                        <br>
                        Responsable de Iva
                        </center>
                        
                </td>
                    <td class="arreglo" style="width:400">No. Factura
                    <input  type="text" name="IdFactura" id="IdFactura" value="<?php echo  $obj->IdFactura ?>" placeholder=" Autómatico" size="40">
                    <input  type="hidden" name="IdPedido" id="IdPedido" value="<?php echo  $obj->IdPedido ?>" placeholder="Dirección" size="40" >
                 
                </td>

            </tr>
            <tr>
                <td class="arreglo" style="background-color:#ECF0F1 ">
                    Nombre
                </td>
                <td class="arreglo">
                <?php 
                        echo $arreglo2[0];
                        echo $arreglo2[1];
                    ?>
                </td>
                <td>
                    Fecha
                </td>
            </tr>
            
            <tr>
                <td class="arreglo" style="background-color:#ECF0F1">
                    Documento
                </td>
                <td class="arreglo">
                <?php 
                        echo $arreglo2[3];
                        
                    ?>
                </td>
                <td>
                         <input  type="date" name="Fecha" id="Feha" value="<?php echo  $obj->Fecha ?>" placeholder="Nombre" size="60">
                </td>  
                
            </tr>
            <tr>
                <td class="arreglo" style="background-color:#ECF0F1">
                    Telefóno
                </td>
                <td class="arreglo">
                <?php 
                        echo $arreglo2[4];
                        
                    ?>
                </td>
                
            </tr> 
            <tr>
                    <td style="background-color:#ECF0F1"   class="arreglo" colspan="6"><center>Detalle</center></td>
            </tr> 
            <tr>
                <td colspan="3">
                    <table class="table-bordered" style="width:900px">
                        <tr>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Producto</center></td>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Nombre Producto</center></td>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Valor Producto</center></td>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Cantidad</center></td>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Iva</center></td>
                            <td style="background-color:#ECF0F1" class="arreglo"><center>Total</center></td>
                        </tr>
                        <?php
                        $c = new Conexion();
                        $cone = $c->conectando();	
                        $sql3 = "select producto.NombreProducto, pedido_detalle.ValorUnitario, pedido_detalle.Cantidad, pedido_detalle.ValorDetalle, pedido_detalle.IvaDetalle, pedido_detalle.ValorTotal from pedido_detalle INNER JOIN producto on pedido_detalle.IdProducto = producto.IdProducto where pedido_detalle.IdPedido ='$obj->IdPedido'";
                        $rs3 = mysqli_query($cone,$sql3);
                        if($arreglo3 = mysqli_fetch_row($rs3)){
                            do{
                        ?>
                        <tr>
                            <td style="width:400" class="arreglo"><?php echo $arreglo3[0] ?></td>
                            <td style="width:200" class="arreglo2"><?php echo number_format($arreglo3[1]) ?></td>
                            <td style="width:100" class="arreglo2"><?php echo $arreglo3[2] ?></td>
                            <td style="width:200" class="arreglo2"><?php echo number_format($arreglo3[3]) ?></td>
                            <td style="width:200" class="arreglo2"><?php echo number_format($arreglo3[4]) ?></td>
                            <td style="width:200" class="arreglo2"><?php echo number_format($arreglo3[5]) ?></td>
                        </tr>           
                        <?php 
                            }while($arreglo3 = mysqli_fetch_row($rs3)); 
                         }
                        ?> 
                    </table>
                </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="arreglo" style="background-color:#ECF0F1">Iva</td>
                    <td>
                    <?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c4 = "select sum(IvaDetalle) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs4 = mysqli_query($cone,$c4);
									$arreglo4 = mysqli_fetch_row($rs4);
                                    $obj->IvaFactura=$arreglo4[0];
                        ?>
                        <input  class="arreglo2" readOnly type="text" name="IvaFactura" id="IvaFactura" value="<?php echo number_format($obj->IvaFactura) ?>" placeholder=" Autómatico" size="40">
                        
                    
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="arreglo" style="background-color:#ECF0F1">Total</td>
                    <td>
                    <?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c5 = "select sum(ValorTotal) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs5 = mysqli_query($cone,$c5);
									$arreglo5 = mysqli_fetch_row($rs5);
                                    $obj->totalFactura=$arreglo5[0];
                        ?>
                        <input  class="arreglo2" readOnly type="text" name="ValorFactura" id="ValorFactura" value="<?php echo number_format($obj->ValorFactura) ?>" placeholder=" Autómatico" size="40">
                        
                    
                    </td>
                </tr>
                               
        </table>
        <br> 
        <button type="button" id="desaparece" class="btn btn-primary btn-sm"  onclick="javascript:imprim1(imprime);"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>   
            </form>
        </center>
        
           
        
    </body>
</html>
<script>
function imprim1(imprime){
  var printContents = document.getElementById('imprime').innerHTML;
  var Obj = document.getElementById("desaparece");
     Obj.style.visibility = 'hidden';
          //window.open();
        // window.document.write(printContents);
       
        window.close(); // necessary for IE >= 10
        window.focus(); // necessary for IE >= 10
		window.print(printContents);
        window.scrollBy(150,0);
		window.close();
        return true;}
</script>
