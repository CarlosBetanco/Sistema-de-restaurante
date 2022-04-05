<?php
include("../conexion/conectar.php");
include("../Modelo/PedidoDetalleModelo.php");
$obj = new PedidoDetalle();
if($_POST)
{
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->FechaPedidos = $_POST['FechaPedido'];
    $obj->HoraPedidos = $_POST['HoraPedido'];
    $obj->IdCliente = $_POST['IdCliente'];
    
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
									


}

?>
<?php

if(isset($_POST['nuevo']))
{

    $c = new Conexion();
    $cone = $c->conectando();	
    $sql = "select * from pedidos order by IdPedido Desc  ";
    $rs1 = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($rs1);
    if($arreglo[0]==""){
        $numero = 0;
        $numero = $arreglo[0];
        $suma = $numero + 1;
        $obj->IdPedido = $suma; 
       // echo $suma;    
    }  
    if($arreglo[0]>0){
        $numero = $arreglo[0];
        echo $numero;
        $suma = $numero + 1;
        echo $suma;
        $obj->IdPedido = $suma; 
      //  echo $suma;    
    } 
    $obj->IdPedido = $_POST['IdPedido'];
    $obj->FechaPedido = null;
    $obj->HoraPedido = null;
    $obj->IdCliente = null;  
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
        <title>Modulo Administrativo</title>
       
    </head>
    <body>
    
        <br>
        <br>
        <center>
       
        <?php 
        sleep(1);
         ?>
        
        
        <h4 class=" text-danger font-weight-normal " >Pedidos</h4> 
        <hr style="height:1px;border:none;color:#333;background-color:#333;">
        <form action="" name="proveedores" id="proveedores" method="POST">
        <table>
        <tr>
                    <td>
                       
                             <button name="guarda" type="submit" onClick="return validar3(this.form)" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Crear</button>
                             <button type="submit"  name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true"></i> Consulta</button>
                             <button name="nuevo" type="submit"  class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Nuevo</button>
                             <button name="generar" type="button" class="btn btn-info btn-sm">Generar Factura</button>
                             <a href="">
                                 <button name="Salir" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Salir</button>
                            </a>
                       
                    </td>
                    
                </tr> 
        </table> 
        <table class="table-bordered" style="width:80%">
        
                <tr class="bg-danger" >
                    <td style="width:900px" class="text-light" colspan="8">Información del Pedido</td>
                </tr>   
                <tr>
                    <td class="arreglo" style="width:10">Número</td>
                    <td class="arreglo"><input readOnly type="text" name="IdPedido" id="IdPedido" value="<?php echo $obj->IdPedido?>" placeholder=" Autómatico" size="10">
                    </td>
                    <td class="arreglo" style="width:10">Fecha</td>
                    <td class="arreglo">
                    <input  type="date" name="FechaPedido" id="FechaPedido"  value="<?php echo $obj->FechaPedidos?>" placeholder="Fechas" size="10">
                </td>
                <td class="arreglo" style="width:10">Hora</td>
                    <td class="arreglo">
                    <input  type="time" name="HoraPedido" id="HoraPedido" value="<?php echo $obj->HoraPedidos?>" placeholder="Horas" size="8">
                </td>
                <td class="arreglo" style="width:100">Clientes</td>
                    <td class="arreglo">
                    <input  type="text" name="IdCliente" id="IdCliente" placeholder="Clientes" size="40">
                </td>
                </tr>  
                <tr class="bg-danger" >
                    <td style="width:500px" class="text-light" colspan="8">Detalle del Pedido</td>
                </tr> 

            
              <tr>
                  <td colspan="9">
                  <?php
            if(isset($_POST['consulta']))
            {
            ?>    
            <iframe src="http://localhost/restaurante/vistas/detalles.php" width="1100"  height="600" frameborder="0"></iframe>
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
