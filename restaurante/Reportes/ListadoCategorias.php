<?php
include("../Conexion/conectar.php");
/*header("-type: aplication/vmd-ms-excel:charset=iso-3359-1");
header("Content-Disposition:attachmet;filename=reporte-clientes.xls");
*/
?>
<?php
$c = new Conexion();
$cone = $c->conectando();
$sql="select * from categorias";
$res = mysqli_query($cone,$sql);
$arreglos= mysqli_fetch_row($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="../Vistas/css/bootstrap.min.css">   
    <link rel="stylesheet" href="Vistas/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,800;1,400;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="librerias/jquery-3.6.0.min.js">
    <link rel="stylesheet" href="Estilos/ResportesEstilo.css"> 
    <title>Modulo Reportes</title>
</head>
<body>
       <div id="datos" class="col-lg-12" style="padding-top:20px">
       <div class="card">
                      <h5 class="card-header">Reporte de Categorias</h5>
                      <div class="card-body">
                          <div class="row">
                          <table class="table table-bordered table-s" width="100%">
                             <thead>
                               <tr>
                                   <th style="width:9%">Codigo</th>
                                   <th style="width:9%">NombreCategoria</th>
                                   
                                   </tr>         
                                         </thead>
                                         <?php
                                         if($arreglos>0){
                                             do{
                                         
                                         ?>
                                   <tbody>
                                       <tr>
                                           <td><?php echo $arreglos[0]  ?></td>
                                           <td><?php echo $arreglos[1]  ?></td>
                                          
                                       </tr>

                                 </tbody>
                                 <?php
                                                       }while($arreglos= mysqli_fetch_row($res));
                                        }else{
                                            echo "No hay regitros en el sistema";
                                        }
                                 ?>
                             </table>
                            </div>
                          </div>
                        </div>
                     </div> <button id="desaparece" class="btn btn-primary" onclick="imprimir(datos)">Imprimir</button>
            
              </body>
        </html>
        <script>
            function imprimir(){
                var obj  = document.getElementById("desaparece");
                obj.style.visibility="hidden";

                window.print();
            }
        </script>