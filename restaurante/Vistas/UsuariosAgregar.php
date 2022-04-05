<?php
include("../Conexion/conectar.php");
include("../Modelo/UsuariosModelo.php");
?>
<?php
$obj = new Usuarios();
if($_POST)
{
    
    $obj->NombreUsuario = $_POST['NombreUsuario'];
    $obj->ClaveUsuario = $_POST['ClaveUsuario'];
    $obj->IdRol = $_POST['IdRol'];
    $obj->ImagenUsuario = $_FILES['ImagenUsuario']['name'];

}
?>
<?php
/*
echo '<pre>';
print_r($_FILES);
echo'</pre>';
*/
?>
<script lenguage="javascript">
function validar(form){
  
  /// Valida Formulario  Usuarios	
  if(form.NombreUsuario.value.length==0)
  {
        alert("Digite El Nombre del Usuario");
        form.NombreUsuario.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.NombreUsuario.value;
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
	              form.NombreUsuario.focus();
	              return (false);
	              }
                  if(!valida)
                {
	               alert("Digite Solo Números en el campo");
	              form.IdRol.focus();
	              return (false);
	              }
        
                  if(form.ClaveUsuario.value.length==0)
      {
        alert("Digite la clave");
        form.ClaveUsuario.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.ClaveUsuario.value;
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
	              form.ClaveUsuario.focus();
	              return (false);
	              }
	  
  if(form.IdRol.value.length==0)
      {
        alert("Digite la clave");
        form.IdRol.focus();
        return(false);
      }
      var letra="0123456789";
      var cadena=form.IdRol.value;
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
        <link rel="stylesheet" href="css/julios2.css">
        <script src="js/validate.js"></script> 
        <title>Modulo Usuarios</title>
       
        </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="clientes" method="POST" enctype="multipart/form-data">
            <h4 class=" text-danger font-weight-normal " >Agregar Usuarios</h4><br>
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>
                        
                        <tr>
                            <td>NombreUsuario</td>
                            <td><input size="20" type="text" name="NombreUsuario" id="NombreUsuario" placeholder="Digite el nombre"></td>
                        </tr>

                        <tr>
                            <td>ClaveUsuario</td>
                            <td><input size="40" type="text" name="ClaveUsuario" id="ClaveUsuario" placeholder="Digite la clave"></td>
                        </tr>
                        
                        <tr>
                            <td>Rol</td>
                            <td><input size="40" type="text" name="IdRol" id="IdRol" placeholder="Digite el Rol"></td>
                        </tr>
                        <tr>
                            <td>Imagen</td>
                            <td><input size="40" type="file" name="ImagenUsuario" id="ImagenUsuario" placeholder="Seleccione la imagen"></td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="Usuarios.php" ><button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>