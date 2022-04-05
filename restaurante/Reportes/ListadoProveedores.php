<?php
include("../Conexion/conectar.php");
/*header("-type: aplication/vmd-ms-excel:charset=iso-3359-1");
header("Content-Disposition:attachmet;filename=reporte-proveedores.xls");
*/
?>
<?php
$c = new Conexion();
$cone = $c->conectando();
$sql="select * from proveedor";
$res = mysqli_query($cone,$sql);
$arreglo= mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="Estilos/EstilosProveedor.css"> 
    <title>Reporte Proveedores</title>
</head>
<body>
       <center>
           <table id="datos" border="1"width="100%">
                             <thead>
                                 <tr>
                                     <th colspan="6">Listado Proveedores</th>
                                 </tr>
                               <tr>
                                   <th >Codigo</th>
                                   <th >Nombre</th>
                                   <th >Telefono</th>
                                   <th >Ciudad</th>
                                   <th >Direccion</th>
                                   <th>Descripcion</th>
                                   </tr>         
                                         </thead>
                                         <?php
                                         if($arreglo>0){
                                              do{
                                         
                                         ?>
                                         <tbody>
                                            <tr>
                                                <td><?php echo $arreglo[0] ?></td>
                                                <td><?php echo $arreglo[1] ?></td>
                                                <td><?php echo $arreglo[2] ?></td>
                                                <td><?php echo $arreglo[3] ?></td>
                                                <td><?php echo $arreglo[4] ?></td>
                                                <td><?php echo $arreglo[5] ?></td>
                                            </tr>
                                         </tbody>
                                         <?php
                                                  }while($arreglo= mysqli_fetch_array($res));
                                             }else{
                                                 echo"No existen registros";
                                             }

                                         ?>

                                    </table>
                             </center>
                             <br>
                             <button id="desaparece" class="boton" onclick="imprimir(datos)">Imprimir</button>
                             
              </body>
        </html>
        <script>
            function imprimir(){
                var obj  = document.getElementById("desaparece");
                obj.style.visibility="hidden";

                window.print();
            }
        </script>