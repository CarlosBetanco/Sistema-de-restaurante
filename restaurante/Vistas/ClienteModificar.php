<?php
 include('../Conexion/conectar.php');
 include("../Modelo/ClienteModelo.php");
?>
<?php
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
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from cliente where IdCliente = '$llave'";
$resultado = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($resultado);
    $obj->IdCliente = $arreglo[0];
    $obj->TipoDocumento = $arreglo[1];
    $obj->Nombre = $arreglo[2];
    $obj->Apellido = $arreglo[3];
    $obj->Telefono = $arreglo[4];
    $obj->Correo = $arreglo[5];
  


?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
         	
        <title>Modulo Productos</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="Producto" method="POST">
            <h4 class=" text-danger font-weight-normal " > Modificar Cliente</h4><br>   
            <table class="table-bordered">
                       <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>

                        <tr>
                            <td>Codigo</td>
                            <td><input readOnly size="10" type="text" name="IdCliente" id="IdCliente" value="<?php echo $obj->IdCliente?>" placeholder="Código es Automatico"></td>
                        </td>
                            <td class="arreglo">Tipo de Documento</td>
                    <td class="arreglo">
                    <select required  name = "TipoDocumento" id="TipoDocumento" class="form-control form-control-sm"  >
                            
                            <option>
                                <?php 
                                    $sql1 = "select TipoDocumento from cliente where IdCliente = '$llave'  ";
                                    $rs1 = mysqli_query($cone,$sql1);
                                    $arreglo1 = mysqli_fetch_row($rs1);
                                    echo $arreglo1[0];
                                ?>
                            </option>   
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
                                    <button type="submit" name="modifica"  class="btn btn-primary btn-sm"> Modificar</button>
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