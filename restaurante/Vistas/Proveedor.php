<?php
 include('../Conexion/conectar.php');
?>

<?php
if($_POST)
{
sleep(1);
$obj->Nombre= $_POST['Nombre'];
                                        
}

$correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
$maximoDatos = 5;
$paginaNumero = 0;

if(isset($_GET['paginaNumero'])){
   $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php
if(isset($_POST['consulta'])){

                                $c = new Conexion();
                                $cone = $c->conectando();
                                $sql = "select * from proveedor where Nombre LIKE '%$obj->Nombre%' ";
                                $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
                                $resultado = mysqli_query($cone,$limite);
                                $arreglo = mysqli_fetch_row($resultado);

                            }else{
                                $c = new Conexion();
                                $cone = $c->conectando();
                                $sql = "select * from proveedor order by Nombre";
                                $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
                                $resultado = mysqli_query($cone,$limite);
                                $arreglo = mysqli_fetch_row($resultado);

}
?>
<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($cone,$sql);
		$totalArreglo = mysqli_num_rows($lista);
	}
$totalPagina = ceil($totalArreglo/$maximoDatos)-1;

?>
<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ /* Consulta una cadena de la base de datos empty(vacio) */
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){ //Compara una cadena dentro de otra cadena
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="../Vistas/css/bootstrap.min.css">        
        
        
        	
        <title>lista Proveedor</title>
    </head>
    <body>
        
        <center>
          <br>   
            <h3 class=" text-danger font-weight-normal  " >Proveedor </h3> 
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <form name="Detalle" action="" method="POST">
            <table >
                 <tr>
                    <td>
                             <a  href="ProveedAgregar.php"><button type="button" class="btn btn-primary btn-sm "><i class="fa fa-file-text-o" aria-hidden="true">Agregar</i></button>
                            </a>
                    </td>
                </tr>
                 <tr>
		                <th><label for="proveedor">Buscar</label></th>
		                <th><input style="font-size:12px" type="text" id="Nombre" name="Nombre"   placeholder="Digite el nombre del Proveedor " size="50" >
                            <button type="submit" name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true">Consultar</i></button>
		                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true">Refrescar</i></button>
		                </th>
		                <th><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-sign-out" aria-hidden="true">Salir</i></button></th>
                        <a href="../Reportes/ListadoProveedores.php">
                        <button type="button" class="btn btn-success">Reporte Excell</i></button></a></th>
                        </th>
                    </tr>

            </table>
        </center>  
            <br>  
            <center>
                <table class= "table  table-bordered table-hover table-sm"  style="width:90%">
                        <caption><small>Lista de Proveedor</small></caption>  
                        <thead>
                            <tr class="table-dark">
                                <th scope="col" style="width:10%"  class="">IdProveedor</th>
                                <th scope="col" style="width:10%"  class="">Nombre</th>
                                <th scope="col" style="width:15%" class="">Telefono</th>
                                <th scope="col" style="width:15%" class="">Ciudad</th>
                                <th scope="col" style="width:5%"  class="">Direccion</th>
                                <th scope="col" style="width:5%"  class="">Descripcion</th>
                                <th scope="col" style="width:5%"  class="">Modificar</th>
                                <th scope="col" style="width:5%"  class="">Eliminar</th>
                            </tr>
                        </thead>
                        <?php
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
                            
                                <td class="letra">
                                <a href="<?php if($arreglo[0] <> ""){
                        echo "ProveedModificar.php?key=".urlencode($arreglo[0]);
                        } else{
                            echo "<script> alert('Debe Consultar El Proveedor')</script>";
                         }
                         ?>">
                            <button name="Guarda" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Modificar</i></button>
                                </a> 
                                </td>
                                <td class="letra">
                                <a href="<?php if($arreglo[0]<>""){
                                            echo "ProveedEliminar.php?key=".urlencode($arreglo[0]);
                                    }else{
                                        echo"<script> alert('Debe de consultar primero')</sccript>";
                                    }
                                    ?>">
                                    <button name="Guarda" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></button>
                                </a> 
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            }while($arreglo = mysqli_fetch_row($resultado));
                        ?>
                <table>
                <tr> 
                     <td><small><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></small></td>           
  	            </tr>
                 <tr>
                <td style="width:90%"> 
                <nav aria-label="Paginador de navegacion">
                <ul class="pagination pagination-sm">

                <li class="page-item">
                    <?php
                         if($paginaNumero > 0){
                    ?> 
                    <a class="page-link" href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>" id="paginador"><i class="fa fa-angle-double-left"></i><< Atras</a></li>
                    <?php }?> 
                   <li class="page-item active">
                     <a class="page-link"  href="#"><?php echo $paginaNumero; ?> <span class="sr-only"></span></a>
                  </li>
                    <li class="page-item">
                    <?php  
                    	 if($paginaNumero < $totalPagina){
                	 ?>
                    <a class="page-link"href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>" id="paginador"> Siguiente >><i class="fa fa-angle-double-right"></i></a></li>
                     <?php }?> 
                  </ul>
                </nav>
                    </td>
                    </tr>
				</table>            
             </center>
             <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

         </form>
         <script src="https://code.jquery-3.6.0.min.js"></script>
         <script src="js/codigo.js"></script>
    </body> 
</html>