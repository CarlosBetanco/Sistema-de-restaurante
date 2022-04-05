<?php
 include('../conexion/conectar.php');
 include("../Modelo/ClienteModelo.php");
?>
<?php
$obj = new Cliente();
if($_POST){
    $obj->IdCliente = $_POST['IdCliente'];
    $obj->TipoDocumento = $_POST['TipoDocumento'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Apellido = $_POST['Apellido'];
    $obj->Telefono = $_POST['Telefono'];
    $obj->Correo = $_POST['Correo'];

    
   
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from cliente where IdCliente = '$llave'";
$resultado = mysqli_query($cone,$sql);
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdCliente = $arreglo[0];
    $obj->TipoDocumento = $arreglo[1];
    $obj->Nombre = $arreglo[2];
    $obj->Apellido = $arreglo[3];
    $obj->Telefono = $arreglo[4];
    $obj->Correo = $arreglo[5];
 
    
    
  
}
else{
    $obj->IdCliente = null;
    $obj->TipoDocumento = null;
    $obj->Nombre = null;
    $obj->Apellido = null;
    $obj->Telefono = null;
    $obj->Correo = null;
    
    
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
         	
        <title>Modulo Clientes</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="producto" method="POST">
            <h4 class=" text-danger font-weight-normal " >Eliminar Cliente</h4><br>   
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>Codigo</td>
                            <td><input  type="text" name="IdCliente" id="IdCliente" value="<?php echo $obj->IdCliente?>" placeholder="Código es Automatico"></td>
                            <td>TipoDocumento</td>
                            <td><input readOnly size="40" type="text" name="TipoDocumento" id="TipoDocumento" value="<?php echo $obj->TipoDocumento?>" placeholder="Código es Automatico"></td>
                            
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre" value="<?php echo $obj->Nombre?>" placeholder="Digite el Detalle"></td>
                            <td>Apellido</td>
                            <td><input size="40" type="text" name="Apellido" id="Apellido" value="<?php echo $obj->Apellido?>" placeholder="Digite el Detalle"></td>
                        </tr>
                        
                        <tr>
                            <td>Telefono</td>
                            <td><input size="40" type="text" name="Telefono" id="Telefono" value="<?php echo $obj->Telefono?>" placeholder="Digite el Detalle"></td>
                            <td>Correo</td>
                            <td><input size="40" type="text" name="Correo" id="Correo" value="<?php echo $obj->Correo?>" placeholder="Digite el Detalle"></td>
                        </tr>
                        </tr>
            
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
                                    <a href="Cliente.php">
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