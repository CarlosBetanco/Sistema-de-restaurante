<?php
include("../Conexion/conectar.php");
?>
<?php
if($_POST)
{
sleep(1);
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
$c = new Conexion();
$cone = $c->conectando();	
$sql = "select * from pedidos order by IdPedido desc";
$rs1 = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($rs1);
    if($arreglo[0]==""){
        $numero = 0;
        $numero = $arreglo[0];
       // $suma = $numero + 1;
        $obj->IdPedido =  $numero; 
        //echo $suma;    
    }  
    if($arreglo[0]>0){
        $numero = $arreglo[0];
       // echo $numero;
        // $suma = $numero + 1;
        $obj->IdPedido =  $numero; 
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
        
        <title>Modulo Detalle</title>
    </head>
    <body class="hidden">
    <!-- Button trigger modal -->

    <div class="centrado" id="onload">    
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

         <center>
    
      <br>   
     
     <form name="Detalles" action="" method="POST">
     <table >
        <tr>
        <!-- Button trigger modal -->

		</tr>

      </table>
     
    </center>  
     <br>  
     <center>
    <table class="table  table-bordered table-hover table-sm " style="width:100%">
    <caption><small>Lista de Productos</small></caption>  
    <thead>
            <tr>
                <td>
                    <input readOnly type="text" name="IdPedido" id="IdPedido" value="<?php echo $obj->IdPedido?>" placeholder=" Autómatico" size="10">
               
                <a href="listaProductos3.php">
                        <button  type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Agregar</i></button>
                    </a> 
                
                <td colspan="2" class="input-group-text">Iva</td>
                <td colspan="2" style= "width:15%"> <?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c2 = "select sum(IvaDetalle) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs2 = mysqli_query($cone,$c2);
									$arreglo2 = mysqli_fetch_row($rs2);
                                    echo number_format ($arreglo2[0]);
                        ?>
                </td>
                <td colspan="2" class="input-group-text">Total</td>
                <td colspan="2"style="width:15%"><?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c3 = "select sum(ValorTotal) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs3 = mysqli_query($cone,$c3);
									$arreglo3 = mysqli_fetch_row($rs3);
                                    echo number_format ($arreglo3[0]);
                        ?></td>

            </tr>        
           
            <tr class="bg-dark">
                <th scope="col" style="width:15%" class="text-light letra">PedidoDetalle</th>
                <th scope="col" style="width:15%" class="text-light letra">Pedido</th>
                <th scope="col" style="width:15%" class="text-light letra">Producto</th>
                <th scope="col" style="width:15%" class="text-light letra">ValorUnitario</th>
                <th scope="col" style="width:15%" class="text-light letra">Cantidad</th>
                <th scope="col" style="width:15%" class="text-light letra">ValorDetalle</th>
                <th scope="col" style="width:10%" class="text-light letra">Iva</th>
                <th scope="col" style="width:10%" class="text-light letra">Total</th>
                <th scope="col" style="width:10%" class="text-light letra">Eliminar</th>

 
            </tr>
        </thead>
        <?php
        $c = new Conexion();
        $cone = $c->conectando();	
        $sql = "select * from pedido_detalle where IdPedido ='$obj->IdPedido'";
           $rs = mysqli_query($cone,$sql);
        if($arreglo = mysqli_fetch_row($rs)){
            do{
        ?>
        
        <tbody>
            <tr>
                <td class="arreglo"><?php echo $arreglo[0] ?></td>
                <td class="arreglo2" ><?php echo  number_format($arreglo[1]) ?></td>
                <td class="arreglo2"><?php echo $arreglo[2] ?>
                <td class="arreglo2"><?php echo number_format($arreglo[3]) ?></td>
                <td class="arreglo2"><?php echo number_format($arreglo[4]) ?></td>
                <td class="arreglo2"><?php echo number_format($arreglo[5]) ?></td>
                <td class="arreglo2"><?php echo number_format($arreglo[6]) ?></td>
                <td class="arreglo2"><?php echo number_format($arreglo[7]) ?></td>
                <td class="letra">
                                <a href="<?php if($arreglo[0]<>""){
                                            echo "PedidoDetalleEliminar.php?key=".urlencode($arreglo[0]);
                                    }else{
                                        echo"<script> alert('Debe de consultar primero')</sccript>";
                                    }
                                    ?>">
                                    <button name="Guarda" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></button>
                                
                    </a> 
                 </td>
                
                
                
            </tr>
           
            
        </tbody>

     
        <?php
            }while($arreglo = mysqli_fetch_row($rs));
                                    }else{
        ?>
        <tr>
            <td colspan="6">
                <?php echo "no hay registros"; ?>
            </td>
        </tr>
        <?php
                                        
                                    }
        ?>
       
           
			</center>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/codigo.js"></script>
        
    </body>
</html>
<script>
  
</script>
