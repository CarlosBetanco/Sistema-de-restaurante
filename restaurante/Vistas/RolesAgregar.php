<?php
 include("../Conexion/conectar.php");
 include("../Modelo/RolesModelo.php");
?>
<?php
$obj = new Roles();
if($_POST){
    $obj->IdProveedor = $_POST['IdRol'];
    $obj->Nombre= $_POST['NombreRol'];
    
   
   
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
  if(form.IdRol.value.length==0)
      {
        alert("Digite El Numero ");
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
       if(!valida)
                {
                   alert("Digite Solo Números ");
                  form.IdRol.focus();
                  return (false);
                  }
                  if(NombreRol.value.length==0)
      {
        alert("Digite El Nombre  Del rol ");
        form.NombreRol.focus();
        return(false);
      }
      var letra="abcdefeghijklmnopqrstuvwxyz + ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var cadena=form.NombreRol.value;
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
	              form.NombreRol.focus();
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
    
         	
        <title>Modulo de Roles</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="proveedor" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar Rol</h4><br>   
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>        
                        <tr>
                            <td>Codigo</td>
                            <td><input size="20" type="text" name="IdRol" id="IdRol" placeholder="Digite el Codigo"></td>
                        </tr>
                        <tr>
                            <td>NombreRol</td>
                            <td><input size="40" type="text" name="NombreRol" id="NombreRol" placeholder=" Digite el Rol "></td>
                        </tr>
                
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" onClick="return validar(this.form)" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="Roles.php" ><button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>