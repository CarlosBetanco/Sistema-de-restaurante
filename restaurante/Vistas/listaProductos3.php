<?php
include("../Conexion/conectar.php");
?>
<?php
if($_POST)
{
sleep(1);
$obj->NombreProducto = $_POST['NombreProducto'];

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

if(isset($_POST['consulta']))
{
									
									$c = new Conexion();
									$cone = $c->conectando();	
                                    $sql = "select producto.IdProducto, producto.NombreProducto, producto.ValorProducto  from  producto  where NombreProducto LIKE '%$obj->NombreProducto %'";
                                    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
									$rs = mysqli_query($cone,$limite);
									$arreglo = mysqli_fetch_row($rs);

                                   
									
                                    
                                    
}else {
									$c = new Conexion();
									$cone = $c->conectando();	
									$sql = "select producto.IdProducto, producto.NombreProducto, producto.ValorProducto from producto order by NombreProducto ";
                                    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
									$rs = mysqli_query($cone,$limite);
									$arreglo = mysqli_fetch_row($rs);
																		



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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios2.css">
        
        <title>Modulo Inventario</title>
    </head>
    <body class="hidden">
    
       
    <div class="centrado" id="onload">    
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
         <center>
    
      <br>   
     <h3 class=" text-danger font-weight-normal  " >Productos</h3> 
     <hr style="height:1px;border:none;color:#333;background-color:#333;">
     <form name="Clientes" action="" method="POST">
     <table >
         
       
         <tr>
		  <th><label for="nombreProductos">Buscar</label></th>
		  <th><input style="font-size:12px" type="text" id="NombreProducto" name="NombreProducto"   placeholder="Digite el Nombre para Consultar" size="50" >
          <button type="submit"  name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true">Consultar</i></button>
		  <button type="submit"  class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true">Refrescar</i></button>
		  </th>

		 <th>
               
            </tr>

      </table>
    </center>  
     <br>  
     <center>
    <table class="table  table-bordered table-hover table-sm " style="width:90%">
    <caption><small>Lista de Productos</small></caption>  
    <thead>
            <tr class="bg-dark">
                <th scope="col" style="width:5%"  class="text-light letra">Codigo</th>
                <th scope="col" style="width:10%" class="text-light letra">Nombre</th>
                <th scope="col" style="width:15%" class="text-light letra">Precio</th>
                <th scope="col" style="width:5%"  class="text-light letra">Agregar</th>
                
            </tr>
        </thead>
        <?php
            do{
        ?>
        <tbody>
            <tr>
                <td class="arreglo"><?php echo $arreglo[0] ?></td>
                <td class="arreglo"><?php echo $arreglo[1] ?></td>
                <td class="arreglo"><?php echo $arreglo[2] ?></td>
                <td class="letra">
                      
                    <a href="<?php if($arreglo[0] <> ""){
                        echo "detallesAgregar.php?key=".urlencode($arreglo[0]);
                        } else{
                            echo "javascript:alert('Debe Consultar El Cliente');";
                         }
                         ?>" >

                        <button   name="Guarda" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-autofit-up" width="21" height="21" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M12 4h-6a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h8" />
  <path d="M18 20v-17" />
  <path d="M15 6l3 -3l3 3" />
</svg></i></button>
                    </a> 
                </td>
                
                
            </tr>
           
            
        </tbody>

     
        <?php
            }while($arreglo = mysqli_fetch_row($rs));
           
        ?>
       
            <table>
                <tr>
                    <td><small><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></small></td>				
                </tr>
                    <tr>
					   <td style="width:90%">          	
                        <nav aria-label="Page navigation example">
						    <ul class="pagination pagination-sm">
                			    
                                <li class="page-item">
							    <?php  
                    		        if($paginaNumero > 0){
                			    ?>
							    <a class="page-link" href="<?php printf("%s?paginaNumero=%d%s",$correrPagina,0,$cargarPagina) ?>" id="paginador"><i class="fa fa-angle-left"></i></a></li>
							    <?php }?>
                            
							    <li class="page-item">
							    <?php  
                    		        if($paginaNumero > 0){
                			    ?>
							    <a class="page-link" href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>" id="paginador"><i class="fa fa-angle-double-left"></i> Atras</a></li>
							    <?php }?>
                               
							    <li class="page-item">
							    <?php  
                    		    if($paginaNumero < $totalPagina){
                			    ?>
							    <a class="page-link" href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>" id="paginador">Siguiente <i class="fa fa-angle-double-right"></i></a></li>
							    <?php }?>
							    <li class="page-item">
							    <?php  
                    		    if($paginaNumero < $totalPagina){
                			    ?>
							    <a class="page-link" href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, $totalPagina,$cargarPagina) ?>" id="paginador"><i class="fa fa-angle-right"></i></a></li>
							<?php }?>		
						</ul>
                </nav>
                        </td>
					</tr>
				</table>
				</center>
        </form>
        <tr>
                            <div  align="center" colspan="2">
                                    <a href="PedidoDetalle.php" > <button type="bUtton" name="salir" class="btn btn-danger btn-sm">Regresar</button></a>
                                </center>
                                </div>
                        </tr>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/codigo.js"></script>
        
    </body>
</html>
<script>
    /*
    function carga(){
        document.write("<center><img src='../imagenes/cargando2.gif' border='0' width='100' height='100'></center>");
        document.write("<center><h3>..Un momento por favor</h3></center>");
       
    }
    function carga2(){
        document.write("<center><img src='../imagenes/cargando2.gif'  border='0' width='100' height='100'></center>");
        document.write("<center><h3>.. favor</h3></center>");
        fadeOut();
    }
*/    

</script>
