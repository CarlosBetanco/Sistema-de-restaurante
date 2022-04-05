<?php
 include('../Conexion/conectar.php');
 include("../Modelo/ProductoModelo.php");
?>
<?php
$obj = new producto();
if($_POST){
    $obj->IdProducto = $_POST['IdProducto'];
    $obj->NombreProducto= $_POST['NombreProducto'];
    $obj->ValorProducto = $_POST['ValorProducto'];
    $obj->IdCategorias = $_POST['IdCategorias'];
    $obj->Cantidad = $_POST['Cantidad'];
    $obj->IvaProducto = $_POST['IvaProducto'];
    $obj->TotalProductos = $_POST['TotalProductos'];
    $obj->IdProveedor = $_POST['IdProveedor'];
    $obj->ImagenProducto = $_FILES['ImagenProducto']['name'];
 
    
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from producto where IdProducto = '$llave'";
$resultado = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($resultado);
    $obj->IdProducto = $arreglo[0];
    $obj->NombreProducto = $arreglo[1];
    $obj->ValorProducto = $arreglo[2];
    $obj->IdCategorias = $arreglo[3];
    $obj->Cantidad = $arreglo[4];
    $obj->IvaProducto = $arreglo[5];
    $obj->TotalProductos = $arreglo[6];
    $obj->IdProveedor = $arreglo[7];
    $obj->ImagenProducto = $arreglo[8];
    
?>
<?php
$c = new Conexion();
$cone = $c->conectando();
$p3 = "select * from proveedor";
$res3 = mysqli_query($cone,$p3);
$arreglo3 = mysqli_fetch_assoc($res3);


$sql2 = "select * from categorias ";
$rs2 = mysqli_query($cone,$sql2);
$resultado2 = mysqli_fetch_assoc($rs2);

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
            <h4 class=" text-danger font-weight-normal " >Modificar Productos</h4><br> 
            <table class="table-bordered">
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td class="arreglo" style="width:100">Codigo</td>
                            <td class="arreglo"><input size="40" type="text" name="IdProducto" id="IdProducto"  value="<?php echo $obj->IdProducto ?>" placeholder="Código es Automatico"></td>
                            <td>NombreProducto</td>
                            <td><input size="40" type="text" name="NombreProducto" id="NombreProducto"  value="<?php echo $obj->NombreProducto ?>" placeholder="Código es Automatico"></td>
                        </tr>
                        
                        <tr>
                            <td>Valor</td>
                            <td><input size="40" type="text" name="ValorProducto" id="ValorProducto" value="<?php echo number_format($obj->ValorProducto) ?>" placeholder="Código es Automatico"></td>
                            
                            <td class="arreglo" style="width:80">Categorias</td>
                            <td class="arreglo">
                       
                        <select name="IdCategorias" id="$obj->IdCategorias">
                                    
                        <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p2 = "select NombreCategoria from categorias where IdCategorias='$obj->IdCategorias'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[0];
                            ?>  

                                        <?php
                                            do{
                                                $codigo = $resultado2['IdCategorias'];
                                                $nombre = $resultado2['NombreCategoria'];
                                                if($codigo == $obj->IdCategorias){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($resultado2 = mysqli_fetch_assoc($rs2));

									        $row = mysqli_num_rows($rs2);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($resultado2 ,0);
										            $resultado2 = mysqli_fetch_assoc($rs2);
									                }


                                        ?>
                                     
                                </select>   
                    </td>
                        </tr>
                        <tr>
                           <td>Cantidad</td>
                            <td><input size="40" type="text" name="Cantidad" id="Cantidad" value="<?php echo number_format($obj->Cantidad) ?>"  placeholder="Digite el Detalle"></td>
                            <td>Iva</td>
                            <td><input size="40" type="text" name="IvaProducto" id="IvaProducto" value="<?php echo number_format($obj->IvaProducto) ?>"  placeholder="Digite el Detalle"></td>
                        </tr>
                        <tr>
                           <td>Total</td>
                            <td><input size="40" type="text" name="TotalProductos" id="TotalProductos" value="<?php echo number_format($obj->TotalProductos) ?>"  placeholder="Digite el Detalle"></td>
                            
                        <td class="arreglo">Proveedores</td>
                        <td>
                        
                        <select name="IdProveedor" id="$obj->IdProveedor">
                                     
                        <?php 
                            $c = new Conexion();
                            $cone = $c->conectando();
                            $p2 = "select Nombre from proveedor where IdProveedor='$obj->IdProveedor'";
                            $res2 = mysqli_query($cone,$p2);
                            $arreglo2 = mysqli_fetch_row($res2);
                            echo $arreglo2[0];
                            ?> 
                                   
                                        <?php
                                            do{
                                                $codigo = $arreglo3['IdProveedor'];
                                                $nombre = $arreglo3['Nombre'];
                                                if($codigo == $obj->IdProveedor){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($arreglo3 = mysqli_fetch_assoc($res3));

									        $row3 = mysqli_num_rows($res3);
									        $rows3=0;
									        if($rows3>0)
									                {
										            mysqli_data_seek($arreglo3 ,0);
										            $arreglo3 = mysqli_fetch_assoc($res3);
									                }


                                        ?>
                                     
                                </select>   
                                  </td>
                        
                        
                        </tr>
                            <tr>
                            <td class="arreglo" style="width:80">Imagen</td>
                            <td  class="arreglo" ><input size="40" type="file" name="ImagenProducto" id="ImagenProducto"  value="<?php echo $obj->ImagenProducto ?>" placeholder="Digite el Detalle"></td>
                            
                            <?php 
						$c = new Conexion();
						$cone = $c->conectando();
						 $p1 = "select ImagenProducto from producto where IdProducto = '$llave'";
						 $q = mysqli_query($cone,$p1);
						 $row = mysqli_fetch_row($q);
						?>
                        <td colspan="4"><center><img  src="<?php echo $row[0] ?>" width="50" height="50"></center></td>

                        </tr> 
                   
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" onClick="return validar1(this.form)" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Modificar</button>
                                    <a href="Producto.php">
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