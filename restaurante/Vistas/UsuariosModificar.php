<?php
 include("../Conexion/conectar.php");
 include("../Modelo/UsuariosModelo.php");
?>
<?php
$obj = new Usuarios();
if($_POST){
    $obj->NombreUsuario = $_POST['NombreUsuario'];
    $obj->ClaveUsuario = $_POST['ClaveUsuario'];
    $obj->IdRol = $_POST['IdRol'];

}
    
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from Usuarios where NombreUsuario ='$llave'";
$resultado =mysqli_query($cone,$sql);
$arreglo =mysqli_fetch_row($resultado);
    $obj->NombreUsuario= $arreglo[0];
    $obj->ClaveUsuario= $arreglo[1];
    $obj->IdRol= $arreglo[2];
    
?>
<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="ciudad.css">
 
       
         	
        <title>Modulo Tipo de Usuarios</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipopago" method="POST">
            <h4 class=" text-danger font-weight-normal " >Modificar Usuarios</h4><br>  
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>  
                        <tr>
                            <td>NombreUsuario</td>
                            <td><input size="40"  readOnly size="10" type="text" name="NombreUsuario" id="NombreUsuario" value="<?php echo $obj->NombreUsuario?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>ClaveUsuario</td>
                            <td><input size="40" type="text" name="ClaveUsuario" id="ClaveUsuario" value="<?php echo $obj->ClaveUsuario  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        <tr>
                            <td>IdRol</td>
                            <td><input size="40" type="text" name="IdRol" id="IdRol" value="<?php echo $obj->IdRol  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="Usuarios.php">
                                             <button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>