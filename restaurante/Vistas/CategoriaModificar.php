<?php
 include("../Conexion/conectar.php");
 include("../Modelo/CategoriasModelo.php");
?>
<?php
$obj = new Categorias();
if($_POST){
    $obj->IdCategorias = $_POST['IdCategorias'];
    $obj->NombreCategoria = $_POST['NombreCategoria'];

}
    
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from categorias where IdCategorias ='$llave'";
$resultado =mysqli_query($cone,$sql);
$arreglo =mysqli_fetch_row($resultado);
    $obj->IdCategorias= $arreglo[0];
    $obj->NombreCategoria= $arreglo[1];
    
?>
<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="ciudad.css">
 
       
         	
        <title>Modulo Categorias</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipopago" method="POST">
            <h4 class=" text-danger font-weight-normal " >Modificar</h4><br> 
                <table class="table-bordered">
                       <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        <tr>
                            <td>Codigo</td>
                            <td><input readOnly size="10" type="text" name="IdCategorias" id="IdCategorias" value="<?php echo $obj->IdCategorias?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Nombre Categoria</td>
                            <td><input size="40" type="text" name="NombreCategoria" id="NombreCategoria" value="<?php echo $obj->NombreCategoria ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="Categorias.php">
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