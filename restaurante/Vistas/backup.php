<?PHP session_start();
/*if(@$HTTP_SESSION_VARS["secretarias_status"] != "login")
	{
    header("Location: login.php");
    } */
include('../Conexion/conectar.php'); 

  $paso=0;
  $ir=0;
    if(isset($_POST['backup'])){
                          echo "hola";
                          $paso=1;
                          $fecha1=date("Y-m-d");
                          $hora = date("H.i");
                          $file = "restaurante$fecha1+$hora.sql";
	                        $x = "C://Copiasbd/mysqldump.exe --opt --password= --user=root restaurante > C://Copiasbd/$file";
                         $y = exec( $x );
	                                    echo $y;
                          if( $y != "" )
	                                   $ir=1;
                                          else 
	                                  $ir=2;
	                                   }
?>


<?php //para que el usuario no tenga acceso
/*
$rs1 = @mysql_query("select codi_nive from usuario where nomb_usua='$m_usuario'") ;
   $row1= @mysql_fetch_array($rs1);
   if ($row1[0]!=1 )
   {
     echo "<script>alert('Usuario no Autorizado para Ingresar a este Modulo');</script>";
      exit(0);
   }
  */ ?> 


<html>
<head>
<title>Sistema de restaurante</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">

</script>

</head>
<body>
<body>
<p>&nbsp;</p>

<form name="form1" method="post" action="backup.php">
  <BR>
    <div align="center">
    <BR>
  <table width="64%" border="5" cellpadding="5"  cellspacing="2" bordercolor="#000000">
        <tr>
          <td height="107" bgcolor="grey"><table width="100%" border="0">
              <tr>
                <td width="74%"><table width="100%" border="1">
                    <tr bgcolor="#CCCCCC">
                      <td bordercolor="#000000" bgcolor="#006600"><div align="center" class="Estilo6 Estilo5"><span class="Estilo1 Estilo7 "><strong><font color="#FFFFFF" >BACKUP DE SISTEMA DE RESTAURANTE</font></strong></span></div></td>
                    </tr>
                    <tr bgcolor="#CCCCCC">
                      <td bordercolor="#000000" bgcolor="#FFFFFF"><div align="center" class="Estilo1 Estilo5"><strong><font color="#000000" >DB-Restaurante</font></strong></div></td>
                    </tr>
                    <tr bgcolor="#CCCCCC">
                      <td bordercolor="#000000" bgcolor="#006600"><div align="center" class="Estilo1 Estilo8 Estilo5"><strong><font color="#FFFFFF" size="2">Fecha de Backup <?php echo date("Y/m/d"); ?> . </font></strong></div></td>
                  </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr bgcolor="grey">
          <td><table width="100%" border="0" bgcolor="green">
              
              <tr>
                <td width="100%" bordercolor="#003300" ><p align="center" class="Estilo6 Estilo2">
			    <?php 	if($paso==0){
			  	?>
			    				<input type="submit" name="backup"  value="Realizar Backup">
			    
				<?php
							}
								else
									{
				    				if($ir==2){
												?>
						  						<br>
						  						<font class="Estilo3" color="#FFFFFF" >Backup Generado </font>
                  								<p align="center" class="Estilo6"><span class="Estilo2"><button href="backup.php">Volver</button>
												<br>
						    					</span>
                        <font color="#FFFFFF">
                  <?php
				  
												echo "La informaci�n esta en el archivo ";
												}
												if($ir==1){
				
				?>
        </font>
                 										   <br>
                    										<span class="Estilo3">El Backup NO Generado</span><br> 
				              
		          											</span>
                    <?php
							
															}
				
										}
			?>
				    
              </p></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </div>
</form>
</body>
</html>
