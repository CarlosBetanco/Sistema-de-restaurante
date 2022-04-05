<?php
 include("../Conexion/conectar.php");
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
    $obj->ImagenProducto = $_FILES['ImagenProduto']['name'];
 
   
}
?>

<?php
$c = new Conexion();
$cone = $c->conectando();	
$sql1 = "select * from categorias ";
$rs1 = mysqli_query($cone,$sql1);
$resultado = mysqli_fetch_assoc($rs1);

$sql2 = "select * from proveedor ";
$rs2 = mysqli_query($cone,$sql2);
$resultado = mysqli_fetch_assoc($rs2);


?>

<?php
/*
echo '<pre>';
print_r($_FILES);
echo'</pre>';
*/
?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
         	
        <title>Modulo Productos</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="producto" method="POST">
            <h4 class=" text-danger font-weight-normal " >Agregar Producto</h4><br>  
            <table class="table-bordered">
            <tr class="bg-dark" >
            <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>Codigo</td>
                            <td><input size="40" type="text" name="IdProducto" id="IdProducto" placeholder="Código es Automatico"></td>
                            <td>NombreProducto</td>
                            <td><input size="40" type="text" name="NombreProducto" id="NombreProducto" placeholder="Código es Automatico"></td>
                        </tr>
                        
                        <tr>
                            <td>Valor</td>
                            <td><input size="40" type="text" name="ValorProducto" id="ValorProducto" value="<?php echo number_format($obj->ValorProducto) ?>" placeholder="Código es Automatico"></td>
                            <td class="arreglo" style="width:80">Categorias</td>
                    <td class="arreglo">
                       
                        <select name="IdCategorias" id="$obj->IdCategorias">
                                    <option>[Seleccione la Categoria]</option>
                                   
                                        <?php
                                            do{
                                                $codigo = $resultado['IdCategorias'];
                                                $nombre = $resultado['NombreCategoria'];
                                                if($codigo == $obj->IdCategorias){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($resultado = mysqli_fetch_assoc($rs1));

									        $row = mysqli_num_rows($rs1);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($resultado ,0);
										            $resultado = mysqli_fetch_assoc($rs1);
									                }


                                        ?>
                                     
                                </select>   
                    </td>
                    </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><input size="40" type="text" name="Cantidad" id="Cantidad" value="<?php echo number_format($obj->Cantidad) ?>" placeholder="Digite el Detalle"></td>
                            <td>Iva</td>
                            <td><input size="40" type="text" name="IvaProducto" id="IvaProducto"  placeholder="Digite el Iva"></td>
                        </tr>
            

                        <tr>
                        <td>Total</td>
                        <td><input size="40" type="text" name="TotalProductos" id="TotalProductos" value="<?php echo number_format($obj->TotalProductos) ?>" placeholder="Digite el Detalle"></td>
                        <td class="arreglo" style="width:80">Proveedores</td>
                        <td class="arreglo" >
                        
                        <select name="IdProveedor" id="$obj->IdProveedor">
                                    <option>[Seleccione El Proveedor]</option>
                                   
                                        <?php
                                            do{
                                                $codigo = $resultado2['IdProveedor'];
                                                $nombre = $resultado2['Nombre'];
                                                if($codigo == $obj->IdProveedor){
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
                            <td>Imagen</td>
                            <td colspan="2" class="arreglo" ><input size="40" type="file" name="ImagenProducto" id="ImagenProducto" placeholder="Digite el Detalle">
                        </td>
                            
                        </tr> 
                        </tr>
                
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="guarda" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar</button>
                                    <a href="Producto.php" ><button type="button" name="salir" class="btn btn-danger btn-sm">Salir</button></a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>