<?php
 include("../Conexion/conectar.php");
 include("../Modelo/TipoPagoModelo.php");
?>
<?php
$obj = new tipopago();
if($_POST){
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Descripcion_Pago = $_POST['Descripcion_Pago'];

}
    
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from tipopago where IdTipoPago ='$llave'";
$resultado =mysqli_query($cone,$sql);
$arreglo =mysqli_fetch_row($resultado);
    $obj->IdTipoPago= $arreglo[0];
    $obj->Descripcion_Pago= $arreglo[1];
    
?>
<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="ciudad.css">
 
       
         	
        <title>Modulo Tipo Pago</title>
    </head>
    <br>
    <br>
    <body>
        <center>
        <form action="" name="tipopago" method="POST">
        <h4 class=" text-danger font-weight-normal  " >Modificar</h4><br> 
        
                <table class="table-bordered" >
                      <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr> 
                        
                        <tr>
                            <td>Codigo</td>
                            <td><input readOnly size="10" type="text" name="IdTipoPago" id="IdTipoPago" value="<?php echo $obj->IdTipoPago?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Metodo de pago</td>
                            <td><input size="40" type="text" name="Descripcion_Pago" id="Descripcion_Pago" value="<?php echo $obj->Descripcion_Pago  ?>" placeholder="Nombre de la Carretera"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button type="submit" name="modifica" class="btn btn-primary btn-sm"> Modificar</button>
                                    <a href="TipoPago.php">
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