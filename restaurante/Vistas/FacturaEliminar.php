<?php
 include("../Conexion/conectar.php");
 include("../Modelo/FacturaModelo.php");
?>
<?php
$obj = new Factura();
if($_POST){
    $obj->IdFactura = $_POST['IdFactura'];
    $obj->IdPedido  = $_POST['IdPedido'];
    $obj->IdTipoPago = $_POST['IdTipoPago'];
    $obj->Fecha= $_POST['Fecha'];
    $obj->CostEnvio = $_POST['CostEnvio'];
    $obj->IvaFactura = $_POST['IvaFactura'];
    $obj->ValorFactura = $_POST['ValorFactura'];
  
}
?>
<?php 
$llave = $_GET['key'];
  //echo $llave;
  $c = new Conexion();
  $cone = $c->conectando();
  $sql = "select * from factura where IdFactura ='$llave'";
  $resultado = mysqli_query($cone,$sql);
  if($arreglo = mysqli_fetch_row($resultado)){
    $obj->IdFactura= $arreglo[0];
    $obj->IdPedido= $arreglo[1];
    $obj->IdTipoPago= $arreglo[2];
    $obj->Fecha= $arreglo[3];
    $obj->CostEnvio= $arreglo[4];
    $obj->IvaFactura= $arreglo[5];
    $obj->ValorFactura= $arreglo[6];
   
 }
  else {
      $obj->IdFactura = null;
      $obj->IdPedido = null;
      $obj->IdTipoPago = null;
      $obj->Fecha = null;
      $obj->CostEnvio = null;
      $obj->IvaFactura = null;
      $obj->ValorFactura = null;
    
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
               
          <title>Modulo Factura</title>
      </head>
      <br>
      <br>
      <body>
          <center>
              <form action="" name="factura" method="POST">
              <h4 class=" text-danger font-weight-normal " >Eliminar Factura</h4><br>   
              <table class="table-bordered">
                  <tr class="bg-dark" >
                       <td style="width:800px" class="text-light" colspan="4">Información del Producto</td>
                       </tr>   
                          
                        <tr>
                            <td>Codigo</td>
                            <td><input size="40" type="text" name="IdFactura" id="IdFactura" value="<?php echo $obj->IdFactura  ?>" placeholder="Nombre de la Carretera"></td>
                        
                            <td class="arreglo" style="width:80">Pedidos</td>
                    <td class="arreglo">
                        
                        <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p2 = "select FechaPedido from pedidos where IdPedido='$obj->IdPedido'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[0];
                            ?>  
                    
                    </td>
                        </tr>
                        <tr>
                        <td class="arreglo" style="width:80">Tipo de Pago</td>
                    <td class="arreglo">
                        
                        <?php 
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $p3 = "select Descripcion_Pago from tipopago where IdTipoPago='$obj->IdTipoPago'";
                                    $res3 = mysqli_query($cone,$p3);
                                    $arreglo3 = mysqli_fetch_row($res3);
                                    echo $arreglo3[0];
                            ?>  
                    
                    </td>
                        
                            <td>Fecha</td>
                            <td><input readOnly size="40" type="text" name="IdTipoPago" id="IdTipoPago" value="<?php echo $obj->IdTipoPago?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>CostEnvio</td>
                            <td><input readOnly size="40" type="text" name="IdTipoPago" id="IdTipoPago" value="<?php echo $obj->IdTipoPago?>" placeholder="Código es Automatico"></td>
                            <td>Iva</td>
                            <td><input readOnly size="40" type="text" name="IvaFactura" id="IvaFactura" value="<?php echo $obj->IvaFactura?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>ValorFactura</td>
                            <td><input readOnly size="40" type="text" name="ValorFactura" id="ValorFactura" value="<?php echo $obj->ValorFactura?>" placeholder="Código es Automatico"></td>
                        </tr>
                          <tr>
                              <td colspan="4">
                                  <center>
                                      <button type="submit" name="elimina" class="btn btn-primary btn-sm"> Eliminar</button>
                                      <a href="Factura.php">
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