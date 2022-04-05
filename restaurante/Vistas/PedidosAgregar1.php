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
<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  tipo pago	
  if(form.IdCategorias.value.length==0)
      {
        alert("Digite El Codigo ");
        form.IdCategorias.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdCategorias.value;
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
                   alert("Digite Solo Números ");
                  form.IdCategorias.focus();
                  return (false);
                  }
                  if(NombreCategoria.value.length==0)
      {
        alert("Digite El Nombre de la categoria");
        form.NombreCategoria.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.NombreCategoria.value;
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
	               alert("requerido");
	              form.NombreCategoria.focus();
	              return (false);
	              }

                
                  if(confirmar==false)
                {
                return(false);
                 }
              return (true);

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
    
         	
        <title>Modulo Categorias</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="categorias" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar</h4><br>  
                <table class="table-bordered">
                <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>  
                        <tr>
                            <td>Codigo</td>
                            <td><input size="20" type="text" name="IdPedido" id="IdPedido" placeholder="Digite el Codigo"></td>
                            <td>Fecha de Pedido</td>
                            <td><input size="40" type="text" name="FechaPedido" id="FechaPedido" placeholder=" Digite la fecha del Pedido"></td>
                        </tr>
                        <tr>
                            <td>Hora de Pedido</td>
                            <td><input size="40" type="text" name="HoraPedido" id="HoraPedido" placeholder=" Digite la hora del Pedido"></td>
                    
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
                            <td><input size="40" type="text" name="IvaPeido" id="IvaPedido" placeholder=" Iva"></td>
                            <td>Total</td>
                            <td><input size="40" type="text" name="TotalPedido" id="TotalPedido" placeholder=" Total"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="Pedidos1.php" > <button type="bUtton" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>