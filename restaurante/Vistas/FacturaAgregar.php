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
$c = new Conexion();
$cone = $c->conectando();
$sql1 = "select * from Pedidos";
$res1 = mysqli_query($cone,$sql1);
$resultado1 = mysqli_fetch_assoc($res1);


$sql2 = "select * from TipoPago";
$res2 = mysqli_query($cone,$sql2);
$resultado2 = mysqli_fetch_assoc($res2);

?>

<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  tipo pago	
  if(form.IdFactura.value.length==0)
      {
        alert("Digite El Codigo");
        form.IdFactura.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdFactura.value;
      var valida=true;

      for(i=0;i<cadena.length; i++)
        {
         
          	ch=cadena.charAt(i);
     	      for(j=0; j<letra.length; j++)
     	      if(ch==letra.charAt(j))
     	      break;
     	      if(j==letra.length)
       		  {
       		    valida = false;
        	    break;
        	    break;
          	}
   	    }
       if(!valida)
                {
	               alert("Digite Solo Números en el campo");
	              form.IdFactura.focus();
	              return (false);
	              }
	  
  if(form.IdPedido.value.length==0)
      {
        alert("Seleccione la fecha del pedido");
        form.IdPedido.focus();
        return(false);
      }
      
	  if(form.IdTipoPago.value.length==0)
      {
        alert("Seleccione el tipo de pago");
        form.IdTipoPago.focus();
        return(false);
      }
  
 
  
  if(form.Fecha.value.length==0)
      {
        alert("Digite la fecha");
        form.Fecha.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.Fecha.value;
      var valida=true;

      for(i=0;i<cadena.length; i++)
        {
         
          	ch=cadena.charAt(i);
     	      for(j=0; j<letra.length; j++)
     	      if(ch==letra.charAt(j))
     	      break;
     	      if(j==letra.length)
       		  {
       		    valida = false;
        	    break;
        	    break;
          	}
   	    }
       if(!valida)
                {
	               alert("Digite Solo Números en el campo Fecha");
	              form.Fecha.focus();
	              return (false);
	              }
 
 
}

</script>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="..estilo">
    
         	
        <title>Modulo pago</title>
    </head>
    <br>
    <br> 
    <body>
        <center>
            <form action="" name="factura" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar Factura</h4><br>
            <table class="table-bordered">
            <tr class="bg-dark" >
            <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>   
                        <tr>
                            <td>IdFactura</td>
                            <td><input size="10" type="text" name="IdFactura" id="IdFactura" placeholder="Código es Automatico"></td>
                            <td class="arreglo" style="width:80">Pedidos</td>
                            <td class="arreglo">
                       
                        <select name="IdPedido" id="$obj->IdPedido">
                                    <option>[Seleccione el Pedido]</option>
                                   
                                        <?php
                                            do{
                                                $codigo = $resultado1['IdPedido'];
                                                $nombre = $resultado1['FechaPedido'];
                                                if($codigo == $obj->IdPedido){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($resultado = mysqli_fetch_assoc($res1));

									        $row = mysqli_num_rows($res1);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($resultado ,0);
										            $resultado = mysqli_fetch_assoc($res1);
									                }
                                        ?>
                                     
                                </select>   
                    </td>
                        </tr>

                        <tr>
                        <td class="arreglo" style="width:80">Tipo de Pago</td>
                        <td class="arreglo" >
                        
                        <select name="IdTipoPago" id="$obj->IdTipoPago">
                                    <option>[Seleccione El Tipo de Pago]</option>
                                   
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
                            <td><input size="40" type="datetime" name="Fecha" id="Fecha" placeholder=" Digite  la fecha"></td>
                        </tr>
                        <tr>
                            <td>CostEnvio</td>
                            <td><input size="40" type="int" name="CostEnvio" id="CostEnvio" placeholder="Costo del  envio"></td>
                            <td>Iva</td>
                            <td><input size="40" type="int" name="IvaFactura" id="IvaFactura" placeholder="Digite el Iva"></td>
                        </tr>
                        <tr>
                            <td>ValorFactura</td>
                            <td><input size="40" type="int" name="ValorFactura" id="ValorFactura" placeholder=" Digite el valor de la factura"></td>
                        </tr>
 
                                                      
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="factura.php" > <button type="bUtton" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>