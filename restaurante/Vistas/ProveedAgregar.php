<?php
 include("../Conexion/conectar.php");
 include("../Modelo/ProveedModelo.php");
?>
<?php
$obj = new proveedor();
if($_POST){
    $obj->IdProveedor = $_POST['IdProveedor'];
    $obj->Nombre= $_POST['Nombre'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Ciudad = $_POST['Ciudad'];
    $obj->Direccion = $_POST['Direccion'];
    $obj->Descripcion = $_POST['Descripcion'];
   
   
}

/*$c = new Conexion();
$cone = $c->conectando();
$p = "select * from ";
$res = mysqli_query($cone,$p);
$arreglo = mysqli_fetch_assoc($res);*/


?>

<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  tipo pago	
  if(form.IdProveedor.value.length==0)
      {
        alert("Digite El Codigo");
        form.IdProveedor.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdProveedor.value;
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
	               alert("Digite Solo Números en el campo Identificacion");
	              form.IdProveedor.focus();
	              return (false);
	              }
	  
  if(form.Nombre.value.length==0)
      {
        alert("Digite El Nombre del  proveedor");
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
	  
  
 
  
  if(form.Telefono.value.length==0)
      {
        alert("Digite El telefóno del  proveedor");
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
                  if(form.Ciudad.value.length==0)
      {
        alert("Digite la ciudad ");
        form.Ciudad.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.Ciudad.value;
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
	               alert("Digite Solo Letras en el campo ciudad");
	              form.Ciudad.focus();
	              return (false);
	              }
	  
    
                  if(form.Direccion.value.length==0)
         {
             alert("Digite La Direccion del Proveedor");
             form.Direccion.focus();
            return(false);
                      }
                      if(form.Descripcion.value.length==0)
      {
        alert("Digite El descripcion");
        form.Descripcion.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.Descripcion.value;
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
	              form.Descripcion.focus();
	              return (false);
	              }
  
  


   var confirmar=confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
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
    
         	
        <title>Modulo Proveedor</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="proveedor" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar Proveedor</h4><br>
                <table class="table-bordered">
                <tr class="bg-dark" >
                     <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                
                        <tr>
                            <td>Codigo</td>
                            <td><input size="10" type="text" name="IdProveedor" id="IdProveedor"  placeholder="Digite el codigo"></td>
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre"  placeholder=" Digite el Nombre "></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input size="40" type="text" name="Telefono" id="Telefono"  placeholder="Digite el Telefono"></td>
                            <td>Ciudad</td>
                            <td><input size="40" type="text" name="Ciudad" id="Ciudad"  placeholder="Digite la Ciudad"></td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td><input size="40" type="text" name="Direccion" id="Direccion"  placeholder="Digite la Direccion"></td>
                            <td>Descripcion</td>
                            <td><input size="40" type="text" name="Descripcion" id="Descripcion"  placeholder="Digite la Descripcion"></td>
                        </tr>
                
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="agregar" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="Proveedor.php" ><button type="button" name="salir"  class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>