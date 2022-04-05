<?php
include("../Conexion/conectar.php");
include("../Modelo/PedidosModelo.php");
$obj = new Pedidos();
if($_POST)
{
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->FechaPedido = $_POST['FechaPedido'];
    $obj->HoraPedido = $_POST['HoraPedido'];
    $obj->IdCliente = $_POST['IdCliente'];
    $obj->IvaPedido = $_POST['IvaPedido'];
    $obj->TotalPedido = $_POST['TotalPedido'];
}
                     
?>
<?php
if(isset($_POST['consulta']))
{

									
									$c = new Conexion();
									$cone = $c->conectando();	
									$sql = "select *  from pedidos  order by IdPedido Desc ";
                                   	$rs = mysqli_query($cone,$sql);
									$arreglo = mysqli_fetch_row($rs);
                                    $obj->IdPedido = $arreglo[0];
                                    $obj->FechaPedido = $arreglo[1];
                                    $obj->HoraPedido = $arreglo[2];
									$obj->IdCliente = $arreglo[3];
                                    $obj->IvaPedido = $arreglo[4];
                                    $obj->TotalPedido = $arreglo[5];


}else {
    $obj->IdPedido = null;
    $obj->FechaPedido = null;
    $obj->HoraPedido = null; 
    $obj->IdCliente = null; 
    $obj->IvaPedido = null;  
    $obj->TotalPedido = null;   

}

?>
<?php

if(isset($_POST['nuevo']))
{

    $c = new Conexion();
    $cone = $c->conectando();	
    $sql = "select max(IdPedido) from pedidos ";
    $rs1 = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($rs1);
   // echo $arreglo[0];
    if($arreglo[0]>0){
        $suma=0;
        $numero = $arreglo[0];
        echo $numero;
        $suma = 1 + $arreglo[0];
        echo $suma;
    }else{
        $suma = 0;
        $numero = $arreglo[0];
        $suma = 1 + $arreglo[0];
     //   echo "el else";
       // echo $suma;
        $obj->IdPedido = $suma;
    }




    
    $obj->IdPedido = $suma;
    $obj->FechaPedido = null;
    $obj->HoraPedido = null;
    $obj->IdCliente = null;  
    $obj->IvaPedido = null; 
    $obj->TotalPedido = null;  
} 

$c = new Conexion();
$cone = $c->conectando();	
$sql4 = "select * from cliente ";
$rs4 = mysqli_query($cone,$sql4);
$resultado4 = mysqli_fetch_assoc($rs4);
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
        <title>Modulo Administrativo</title>
       
    </head>
    <body>
    
        <br>
        <br>
        <center>
       
        <?php 
        sleep(1);
         ?>
        
        
        <h4 class=" text-danger font-weight-normal " >Orden</h4> 
        <hr style="height:1px;border:none;color:#333;background-color:#333;">
        <form action="" name="proveedores" id="proveedores" method="POST">
        <table>
        <tr>
                    <td>
                       
                             <button name="guarda" type="submit" onClick="return validar3(this.form)" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Crear</button>
                             <button type="submit"  name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true"></i> Consulta</button>
                             <button name="nuevo" type="submit"  class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Nuevo</button>
                             <a href="<?php if($arreglo[0] <> ""){
                                echo "ReciboFactura.php?key=".urlencode($arreglo[0]);
                                } else{
                                         echo "javascript:alert('Debe Consultar El Cliente');";
                                     }
                         ?>">
                             <button name="imprimir" type="button"   class="btn btn-info btn-sm"><i class="fa fa-ticket" aria-hidden="true"></i>Generar Factura</button>
                             </a>
                             
                             <a href="">
                                 <button name="Salir" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Salir</button>
                            </a>
                            
                    </td>
                    
                </tr> 
        </table> 
        <table class="table-bordered" style="width:80%">
        
                <tr class="bg-success" >
                    <td style="width:900px" class="text-light" colspan="8">Información de la Orden</td>
                </tr>   
                <tr>
                    <td class="arreglo" style="width:10">Número</td>
                    <td class="arreglo"><input type="text" name="IdPedido" id="IdPedido" value="<?php echo $obj->IdPedido?>" placeholder=" Autómatico" size="10">
                    </td>
                    <td class="arreglo" style="width:10">Fecha de Pedido</td>
                    <td class="arreglo">
                    <input  type="date" name="FechaPedido" id="FechaPedido"  value="<?php echo $obj->FechaPedido?>" placeholder="Fechas" size="10">
                </td>
                <td class="arreglo" style="width:10">Hora de Pedido</td>
                    <td class="arreglo">
                    <input  type="time" name="HoraPedido" id="HoraPedido" value="<?php echo $obj->HoraPedido?>" placeholder="Horas" size="8">
                </td>
                
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
                    <td class="arreglo" style="width:100" colspan="2">Iva</td>
                    <?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c2 = "select sum(IvaDetalle) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs2 = mysqli_query($cone,$c2);
									$arreglo2 = mysqli_fetch_row($rs2);
                                   if($arreglo2[0]>0){
                                                     $obj->IvaPedido=$arreglo2[0];
                                   }else{
                                    $obj->IvaPedido=0;
                                   }

                    ?>
                    <td class="arreglo" colspan="2">
                    <input  type="text" name="IvaPedido" id="IvaPedido" value="<?php echo $obj->IvaPedido?>" size="40">
                    </td>
                    <td class="arreglo" style="width:100" colspan="2">Total</td>
                    <?php
									$c = new Conexion();
									$cone = $c->conectando();	
									$c3 = "select sum(ValorTotal) from pedido_detalle where IdPedido = '$obj->IdPedido' ";
                                   	$rs3 = mysqli_query($cone,$c3);
									$arreglo3 = mysqli_fetch_row($rs3);
                                    if($arreglo3[0]>0){
                                        $obj->totalPedidos=$arreglo3[0];
                                    }else{
                                        $obj->TotalPedido=0;
                                         }
                                   
                        ?>
                    <td class="arreglo" colspan="2">
                   
                    <input  type="text" name="TotalPedido" id="TotalPedido" value="<?php echo $obj->TotalPedido?>" size="40">
                    </td>
                </tr>  
                <tr class="bg-success" >
                    <td style="width:500px" class="text-light" colspan="8">Detalle del Pedido</td>
                </tr> 

            
              <tr>
                  <td colspan="11">
                  <?php
            if(isset($_POST['consulta']))
            {
            ?>    
            <iframe src="http://localhost/restaurante/vistas/PedidoDetalle.php" width="1400"  height="600" frameborder="0"></iframe>
                <?php
            }
                ?>
                  </td>
              </tr>                
            </table>
           
                </form>
        </center>
      
    </body>
</html>
