<?php
 include('../Conexion/conectar.php');
 include("../Modelo/PromocioModelo.php");
?>
<?php
$obj = new promocion();
if($_POST){
    $obj->IdPromocion = $_POST['IdPromocion'];
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->IdNombre = $_POST['Nombre'];
    $obj->Detalle = $_POST['Detalle'];
    $obj->Fecha_Inicio = $_POST['Fecha_Inicio'];
    $obj->Fecha_Fin = $_POST['Fecha_Fin'];
    $obj->ValorPromocion = $_POST['ValorPromocion'];
    
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from promocion where IdPromocion = '$llave'";
$resultado = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($resultado);
    $obj->IdPromocion = $arreglo[0];
    $obj->IdProducto = $arreglo[1]; 
    $obj->Nombre = $arreglo[2];
    $obj->Detalle = $arreglo[3];
    $obj->Fecha_Inicio = $arreglo[4];
    $obj->Fecha_Fin = $arreglo[5];
    $obj->ValorPromocion = $arreglo[6];
?>
<?php
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
        <link rel="stylesheet" href="css/julios.css">
         	
        <title>Modulo Promociones</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="Promocion" method="POST">
            <h4 class=" text-danger font-weight-normal " >Modificar Promocion</h4><br>
                <table class="table-bordered">
                <tr class="bg-dark" >
                      <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>
                        <tr>
                            <td>Código</td>
                            <td><input  size="10" type="text" name="IdPromocion" id="IdPromocion" value="<?php echo $obj->IdPromocion?>" placeholder="Código es Automatico"></td>
                            <td class="arreglo" style="width:80">IdProducto</td>
                            <td class="arreglo">
                            <select name="IdProducto" id="$obj->IdProducto">
                            <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p2 = "select NombreProducto from producto where IdProducto='$obj->IdProducto'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[0];
                            ?>  
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
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="Nombre" id="Nombre" value="<?php echo $obj->Nombre  ?>" placeholder="Digite Nombre"></td>
                            <td>Detalle</td>
                            <td><input size="40" type="text" name="Detalle" id="Detalle" value="<?php echo $obj->Detalle  ?>" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Fecha Inicio</td>
                            <td><input size="40" type="text" name="Fecha_Inicio" id="Fecha_Inicio" value="<?php echo $obj->Fecha_Inicio  ?>" placeholder=""></td>
                            <td>Fecha Fin</td>
                            <td><input size="40" type="text" name="Fecha_Fin" id="Fecha_Fin" value="<?php echo $obj->Fecha_Fin  ?>" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Valor Promocion</td>
                            <td><input size="40" type="text" name="ValorPromocion" id="ValorPromocion" value="<?php echo $obj->ValorPromocion  ?>" placeholder="Valor"></td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="Promocion.php">
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