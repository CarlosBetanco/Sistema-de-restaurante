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
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdProducto = $arreglo[0];
    $obj->NombreProducto = $arreglo[1];
    $obj->ValorProducto = $arreglo[2];
    $obj->IdCategorias = $arreglo[3];
    $obj->Cantidad = $arreglo[4];
    $obj->IvaProducto = $arreglo[5];
    $obj->TotalProductos = $arreglo[6];
    $obj->IdProveedor = $arreglo[7];
    $obj->ImagenProducto = $arreglo[8];
    
    
  
}
else{
    $obj->IdProducto = null;
    $obj->NombreProducto = null;
    $obj->ValorProducto = null;
    $obj->IdCategoria = null;
    $obj->Cantidad = null;
    $obj->IvaProducto = null;
    $obj->TotalProductos = null;
    $obj->IdProveedor = null;
    $obj->ImagenProducto = null;
    

    
}
?>
<?php
/*echo '<pre>';
print_r($_FILES);
echo '</pre>';*/


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
        <?php 
        sleep(1);
         ?>
            <form action="" name="producto" method="POST">
            <h4 class=" text-danger font-weight-normal " >Eliminar Producto</h4><br> 
            <table class="table-bordered">                
            <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                        <tr>
                            <td>Código</td>
                            <td><input readOnly size="10" type="text" name="IdProducto" id="IdProducto" value="<?php echo $obj->IdProducto?>" placeholder="Código es Automatico"></td>
                            <td>NombreProducto</td>
                            <td><input size="40" type="text" name="NombreProducto" id="NombreProducto" value="<?php echo $obj->NombreProducto  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                    
                        <tr>
                        <td>ValorProducto</td>
                            <td><input size="40" type="text" name="ValorProducto" id="ValorProducto" value="<?php echo $obj->ValorProducto ?>" placeholder="Nombre de la Carretera"></td>
                            <td class="arreglo" style="width:80">Categorias</td>
                    <td class="arreglo">
                        
                        <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p2 = "select NombreCategoria from categorias where IdCategorias='$obj->IdCategorias'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[0];
                            ?>  
                    
                    </td>
                        </tr>
                        
                        <tr>
                        <td>Cantidad</td>
                            <td><input size="40" type="text" name="Cantidad" id="Cantidad" value="<?php echo $obj->Cantidad  ?>" placeholder="Nombre de la Carretera"></td>
                            <td>Iva</td>
                            <td><input size="40" type="text" name="IvaProducto" id="IvaProducto" value="<?php echo $obj->IvaProducto  ?>" placeholder="Automatico"></td> 
                        </tr>
                        <tr>
                        <td>TotalProductos</td>
                        <td><input size="40" type="text" name="TotalProductos" id="TotalProductos" value="<?php echo $obj->TotalProductos  ?>" placeholder="Nombre de la Carretera"></td>
                            <td class="arreglo">Proveedores</td>
                                 <td class="arreglo">                      
                               <?php 
                               $c = new Conexion();
                                     $cone = $c->conectando();
                                    $p3 = "select Nombre from proveedor where IdProveedor='$arreglo[7]'";
                                     $res3 = mysqli_query($cone,$p3);
                                     $arreglo3 = mysqli_fetch_array($res3);
                                    echo $arreglo3[0];
                               ?>    
                  
                              </td>
                        
                        <tr>
                        <td class="arreglo" style="width:80">Imagen del producto</td>
                        <td class="arreglo"><input size="40" readOnly type="file" name="ImagenProducto" id="ImagenProducto" value="<?php echo $obj->ImagenProducto ?>" placeholder="Nombre de la Carretera"></td>
                        <?php 
						$c = new Conexion();
						$cone = $c->conectando();
						 $p1 = "select ImagenProducto from producto where IdProducto = '$llave'";
						 $q = mysqli_query($cone,$p1);
						 $row = mysqli_fetch_row($q);
						?>
                        <td colspan="4"><center><img  src="<?php echo $row[0] ?>" width="50" height="50"></center></td>
                    </tr> 
              </td> 
   
               </tr> 
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
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