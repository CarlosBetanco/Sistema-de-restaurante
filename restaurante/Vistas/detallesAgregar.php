<?php
include("../conexion/conectar.php");
include("../Modelo/PedidoDetalleModelo.php");
$obj = new PedidoDetalle();
if($_POST)
{
    $obj->IdPedidoDetalle = $_POST['IdPedidoDetalle'];
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->IdProducto= $_POST['IdProducto'];
    $obj->ValorUnitario= $_POST['ValorUnitario'];
    $obj->Cantidad = $_POST['Cantidad'];
    $obj->IdProducto= $_POST['IdProducto'];
    $obj->ValorDetalle= $_POST['ValorDetalle'];
    $obj->ValorTotal = $_POST['ValorTotal'];
   
    
}
?>
<?php
$llave = $_GET['key'];
echo $llave;
$c = new Conexion();
$cone = $c->conectando();	
$sql = "select * from producto where IdProducto='$llave'";
$rs1 = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_array($rs1);
    $obj->IdProducto = $arreglo[0];
    $obj->NombreProducto = $arreglo[1];
    $obj->ValorProducto = $arreglo[2];
    $obj->Cantidad = $arreglo[3];
    $obj->TotalProductos = $arreglo[4];
    $obj->IdCategoria = $arreglo[5];
    $obj->IdProveedor = $arreglo[6];
    echo $obj->IdProducto ;
?>

<?php
$c = new Conexion();
$cone = $c->conectando();	
$sql = "select * from pedidos order by IdPedido Desc ";
$rs1 = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($rs1);
    if($arreglo[0]==""){
        $numero = 0;
        $numero = $arreglo[0];
       // $suma = $numero + 1;
        $obj->IdPedido = $numero ; 
        //echo $suma;    
    }  
    if($arreglo[0]>0){
        $numero = $arreglo[0];
       // echo $numero;
        //$suma = $numero + 1;
        $obj->IdPedido = $numero ; 
       // echo $suma;    
    }   
    

?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">	
        <link rel="stylesheet" href="css/julios2.css">
        <script src="js/validate.js"></script> 
        <title>Modulo Inventarios</title>
       
    </head>
    <body>
    
        <br>
        <br>
        <center>
       
        <?php 
        sleep(1);
         ?>
        
        
        <h4 class=" text-danger font-weight-normal " >Agregar Productos</h4> 
        <hr style="height:1px;border:none;color:#333;background-color:#333;">
        <form action="" name="productos" id="productos" method="POST">
         <table class="table-bordered">
                <tr class="bg-dark" >
                    <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                </tr>   
                <tr>
               
                <input  type="text" name="IdPedido" id="IdPedido" value="<?php echo  $obj->IdPedido ?>" placeholder="Código Automático" size="40">  
                <input  type="text" name="IdPedidoDetalle" id="IdPedidoDetalle" value="<?php echo  $obj->IdPedidoDetalle ?>" placeholder="Código Automático" size="40">
                <td class="arreglo" style="width:100">Código</td>
                    <td class="arreglo"><input  type="text" name="IdProducto" id="IdProducto" value="<?php echo $obj->IdProducto ?>"  size="40">
                   
                    </td>
                    <td class="arreglo">Valor Producto</td>
                    <td class="arreglo"><input  type="text" name="ValorProducto" id="ValorProducto" value="<?php echo  $obj->ValorProducto ?>" placeholder="Digite el Nombre del Producto" size="40">
                  
                </tr>  
                <tr>
                <td class="arreglo">Producto</td>
                    <td class="arreglo"><input  type="text" name="NombreProducto" id="NombreProducto" value="<?php echo  $obj->NombreProducto ?>" placeholder="Digite la Cantidad del Producto" size="40" ></td>
                    <td class="arreglo">Cantidad</td>
                    <td class="arreglo"><input  type="text" name="Cantidad" id="Cantidad" value="<?php echo  $obj->Cantidad ?>" placeholder="Digite la Cantidad del Producto" size="40" onBlur="sumas()" ></td>
                    
                </tr> 
                <tr>
                
                <td class="arreglo" >Iva</td>
                    <td class="arreglo"><input  type="text" name="IvaDetalle" id="IvaDetalle"  value="<?php echo $obj->IvaDetalle ?>" placeholder="Digite el Total " size="40" onBlur="iva()" ></td>
                    <td class="arreglo" >Valor Total</td>
                    <td class="arreglo"><input  type="text" name="ValorTotal" id="ValorTotal"  value="<?php echo $obj->ValorTotal ?>" placeholder="Digite el Total " size="40" ></td>
            
                </tr> 
              
                <tr>
                    <td colspan="4">
                        <center>
                             <button name="guarda" type="submit" onClick="return validar1(this.form)" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                             
                             <a href="PedidoDetalle.php">
                                 <button name="Salir" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Salir</button>
                            </a>
                        </center>
                    </td>
                    
                </tr> 
            </table>
            </form>
        </center>
    </body>
</html>
<script>
function sumas(){
    //alert("suma");
   var valor = productos.ValorProducto.value;
   //alert("el Valor es"+valor);
   var cantidad = productos.Cantidad.value;
   //alert("la Cantidad es"+cantidad);
   var r = parseInt(valor)*parseInt(ValorProducto);
   //alert("total es"+r);
   var r = parseInt(valor)*parseInt(cantidad);
   //alert("total es"+r);
   var iva = 19;
   //alert("iva"+iva);
   var  saca = (parseInt(r)*parseInt(iva))/100;
   //alert("porcentaje"+saca);
   productos.IvaDetalle.value=saca;
   var total = (parseInt(saca)+parseInt(r));
  // alert("total"+total);
   productos.ValorTotal.value=total;

}

</script>