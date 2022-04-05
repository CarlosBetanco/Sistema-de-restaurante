<?php 
class Usuarios{
		public $NombreUsuario;
        public $ClaveUsuario;
		public $IdRol;
		public $ImagenUsuario;
       
       
    
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				     $sql = "select * from usuarios where NombreUsuario = '$this->NombreUsuario'";
				     $rs = mysqli_query($cone,$sql);
					 if(mysqli_fetch_array($rs))
								{
								echo "<script> alert('El Usuario ya existe en el sistema de Información')</script>";
								}								
								else{
									$c = new Conexion();
									$cone = $c->conectando();
									$ruta='../img/'.$_FILES['ImagenUsuario']['name'];
									move_uploaded_file($_FILES['ImagenUsuario']['tmp_name'],$ruta);
									$insertar = "insert into usuarios values('$this->NombreUsuario',
									                                        '$this->ClaveUsuario',
                                                                            '$this->IdRol',
                                                                            '$ruta'
                                                                            )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El Usuario fue creado en el sistema de información')</script>";
								
								}									
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from usuarios where ClaveUsuario ='$this->ClaveUsuario'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																echo "<script> alert('El Usuario a Modificar ya existe')</script>";
																}
																else
																	{
																	$update = "update usuarios set NombreUsuario = '$this->NombreUsuario',
																	                              ClaveUsuario = '$this->ClaveUsuario',
																	                              IdRol = '$this->IdRol';
																								
                                                                                                  ";
																	echo $update;							  
																	mysqli_query($cone,$update);
																	echo "<script> alert('El Usuario  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from usuarios where NombreUsuario='$this->NombreUsuario'";
									if(mysqli_query($cone,$sql))
									{
									echo "<script> alert('El Cliente fue Eliminado del Sistema de Información');</script>";
									}
										else
											{
											echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
											}
								}
				
				function limpiar(){
									$this->NombreUsuario = Null;
									$this->ClaveUsuario = Null;
									$this->IdRol = Null;
                                    
                                    
                                    
									
				}

				

}
?>