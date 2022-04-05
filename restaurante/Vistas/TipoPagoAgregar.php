<?php
 include("../Conexion/conectar.php");
 include("../Modelo/TipoPagoModelo.php");
?>
<?php
$obj = new tipopago();
if($_POST){
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Descripcion_Pago = $_POST['Descripcion_Pago'];
  
}
?>

<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  tipo pago	
  if(form.IdTipoPago.value.length==0)
      {
        alert("Digite El Codigo ");
        form.IdTipoPago.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdTipoPago.value;
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
                  form.IdTipoPago.focus();
                  return (false);
                  }
                  if(Descripcion_Pago.value.length==0)
      {
        alert("Digite El Metodo de Pago");
        form.Descripcion_Pago.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.Descripcion_Pago.value;
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
	               alert("Digite Solo Letras en el campo Nombre");
	              form.Descripcion_Pago.focus();
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
    
         	
        <title>Modulo pago</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipopago" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar</h4><br>  
            <table class="table-bordered">
                       <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>
                        
                        <tr>
                            <td>Codigo</td>
                            <td><input size="20" type="text" name="IdTipoPago" id="IdTipoPago" placeholder="Digite el Codigo"></td>
                        </tr>
                        <tr>
                            <td>Metodo de pago</td>
                            <td><input size="40" type="text" name="Descripcion_Pago" id="Descripcion_Pago" placeholder="Metodo de pago"></td>
                        </tr>
                    
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="TipoPago.php" > <button type="bUtton" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>