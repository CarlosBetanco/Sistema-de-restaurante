<?php
include("../Conexion/conectar.php");
include("../Modelo/ClienteModelo.php");
$obj = new Cliente();
if($_POST)
{
    
    $obj->IdCliente = $_POST['IdCliente'];
    $obj->TipoDocumento = $_POST['TipoDocumento'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Apellido = $_POST['Apellido'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Correo = $_POST['Correo'];
    
    
}
?>

<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  Cliente	
  if(form.IdCliente.value.length==0)
      {
        alert("Digite El Codigo");
        form.IdCliente.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdCliente.value;
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
	              form.IdCliente.focus();
	              return (false);
	              }
	  
    
     if(form.TipoDocumento.length==0)
      {
        alert("Seleccione el tipo de Documento");
        form.TipoDocumento.focus();
        return(false);
      }

  if(form.Nombre.value.length==0)
      {
        alert("Digite El Nombre del Cliente");
        form.Nombre.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.Nombre.value;
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
	              form.Nombre.focus();
	              return (false);
	              }
	  
  
  if(form.Apellido.value.length==0)
      {
        alert("Digite El Apellido del Cliente");
        form.Apellido.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.Apellido.value;
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
	               alert("Digite Solo Letras en el campo Apellido");
	              form.Apellido.focus();
	              return (false);
	              }
  
  if(form.Telefono.value.length==0)
      {
        alert("Digite El telefóno del Cliente");
        form.Telefono.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.Telefono.value;
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
	               alert("Digite Solo Números en el campo Número Teléfonico");
	              form.Telefono.focus();
	              return (false);
	              }
	  
    
     
  
  if(form.Correo.value.length==0)
      {
        alert("Digite El Correo del Cliente");
        form.Correo.focus();
        return(false);
      }


   var confirmar=confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
   if(confirmar==false)
       {
       return(false);
        }
     return (true);
 
 
}

</script>
<?php
$c = new Conexion();
$cone = $c->conectando();	
$p1 = "select * from pedidos";
$res1 = mysqli_query($cone,$p1);
$arreglo = mysqli_fetch_assoc($res1);

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
        <title>Modulo Clientes</title>
       
        </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="clientes" method="POST">
            <h4 class=" text-danger font-weight-normal " >Clientes Agregar</h4><br> 
            
            <table class="table-bordered">  
                       <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td class="arreglo">Codigo</td>
                            <td><input size="40" type="text" name="IdCliente" id="IdCliente" placeholder="Digite el Codigo"></td>
                            </td>
                    <td class="arreglo">Tipo de Documento</td>
                    <td class="arreglo">
                    <select required  name = "TipoDocumento" id="TipoDocumento" class="form-control form-control-sm"  >
                            <option>[Seleccione el Tipo de Documento]</option>
                            <option = "1">T.I</option>
				            <option = "2">C.C</option>
				            <option = "3">C.Ex</option>
				            <option = "4">Pasaporte</option>
				            <option = "5">Registro Civil</option>
                            <option = "6">Permiso Residente</option>
                        </select>
                    </td>
                        </tr>
                        
                        <tr>
                            <td class="arreglo">Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre" placeholder="Digite el Nombre"></td>
                            <td class="arreglo">Apellido</td>
                            <td><input size="40" type="text" name="Apellido" id="Apellido" placeholder="Digite el Apellido"></td>
                        </tr>
            
                        <tr>
                            <td class="arreglo">Telefono</td>
                            <td><input size="40" type="text" name="Telefono" id="Telefono" placeholder="Digite el Telefono"></td>
                            <td class="arreglo">Correo</td>
                            <td><input size="40" type="text" name="Correo" id="Correo" placeholder="Digite el Correo"></td>
                        </tr>
                         
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="cliente.php" ><button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>