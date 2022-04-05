<?php
 include("../Conexion/conectar.php");
 include("../Modelo/PromocioModelo.php");
?>
<?php
$obj = new promocion();
if($_POST){
    $obj->IdPromocion = $_POST['IdPromocion'];
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Detalle = $_POST['Detalle'];
    $obj->Fecha_Inicio = $_POST['Fecha_Inicio'];
    $obj->Fecha_Fin = $_POST['Fecha_Fin'];
    $obj->ValorPromocion = $_POST['ValorPromocion'];
   
   
}

$c = new Conexion();
$cone = $c->conectando();
$p = "select * from producto";
$res = mysqli_query($cone,$p);
$arreglo = mysqli_fetch_assoc($res);


?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
         	
        <title>Modulo Promociones</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="promocion" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar Promocion</h4><br>
            <table class="table-bordered">
            <tr class="bg-dark" >
                   <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>IdPromocion</td>
                            <td><input size="20" type="text" name="IdPromocion" id="IdPromocion" placeholder="Digite el codigo"></td>
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre" placeholder=" Digite el Nombre "></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><input size="40" type="text" name="Detalle" id="Detalle" placeholder="Digite el Detalle"></td>
                            <td>Fecha_Inicio</td>
                            <td><input size="40" type="text" name="Fecha_Inicio" id="Fecha_Inicio" placeholder="Digite la Fecha"></td>
                        </tr>
                        <tr>
                            <td>Fecha_Fin</td>
                            <td><input size="40" type="text" name="Fecha_Fin" id="Fecha_Fin" placeholder="Digite la Fecha"></td>
                            <td>ValorPromocion</td>
                            <td><input size="40" type="text" name="ValorPromocion" id="ValorPromocion" placeholder="Dgite el valor"></td>
                        </tr>
                        
                        <tr>
                            <td>IdProducto</td>
                            <td><select name="IdProducto" id="$obj->IdProducto">
                                    <option>[Seleccione el producto]</option>
                                    <option>
                                        <?php
                                            do{
                                                $codigo = $arreglo['IdProducto'];
                                                $nombre = $arreglo['NombreProducto'];
                                                if($codigo == $obj->IdProducto){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($arreglo = mysqli_fetch_assoc($res));

									        $row = mysqli_num_rows($res);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($arreglo ,0);
										            $arreglo = mysqli_fetch_assoc($res);
									                }
                                        ?>
                                    </option>    
                                </select>   
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" class="btn btn-primary btn-sm">Guardar</button>
                                    <a href="Promocion.php" ><button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>