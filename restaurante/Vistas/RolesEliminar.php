<?php
 include('../conexion/conectar.php');
 include("../Modelo/RolesModelo.php");
?>
<?php
$obj = new Roles();
if($_POST){
    $obj->IdRol = $_POST['IdRol'];
    $obj->Nombre = $_POST['NombreRol'];
    
    
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from roles where IdRol = '$llave'";
$resultado = mysqli_query($cone,$sql);
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdRol = $arreglo[0];
    $obj->NombreRol = $arreglo[1];
   
  
}
else{
    $obj->IdRol  = null;
    $obj->NombreRol = null;
   
    
}
?>


<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
         	
        <title>Modulo Proveedor</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="proveedor" method="POST">
            <h4 class=" text-danger font-weight-normal " >Eliminar Rol</h4><br>  
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>Código</td>
                            <td><input readOnly size="10" type="text" name="IdRol" id="IdRol" value="<?php echo $obj->IdRol?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>NombreRol</td>
                            <td><input size="40" type="text" name="NombreRol" id="NombreRol" value="<?php echo $obj->NombreRol ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
                                    <a href="Roles.php">
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