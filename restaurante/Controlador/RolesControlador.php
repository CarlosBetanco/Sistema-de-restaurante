<?php 
class Roles{
		public $IdRol;
		public $NombreRol;
        
        
		

		
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				     $sql = "select * from roles where NombreRol = '$this->NombreRol'";
				     $rs = mysqli_query($cone,$sql);
					 if(mysqli_fetch_array($rs))
								{
								echo "<script> alert('El Rol ya existe en el sistema de Información')</script>";
								}								
								else{
									$insertar = "insert into usuarios values('$this->IdRol',
                                                                            '$this->NombreRol'
                                                                            
                                                                    
                                                                            )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El Rol fue creado en el sistema de información')</script>";
								
								}									
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from roles where NombreRol ='$this->NombreRol'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																echo "<script> alert('El Rol a Modificar ya existe')</script>";
																}
																else
																	{
																	$id = "update usuarios set
																	       IdRol = '$this->IdRol',
                                                                           NombreRol = '$this->NombreRol'
																	       
                                                                           ";
																	mysqli_query($cone,$id);
																	echo $id;
																	echo "<script> alert('El Rol  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from roles where NombreRol='$this->NombreRol'";
									if(mysqli_query($cone,$sql))
									{
									echo "<script> alert('El Rol fue Eliminado del Sistema de Información');</script>";
									}
										else
											{
											echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
											}
								}
				
				function limpiar(){
									$this->IdRol = Null;
                                    $this->NombreRol = Null;
									
									
				}

				

}
?>