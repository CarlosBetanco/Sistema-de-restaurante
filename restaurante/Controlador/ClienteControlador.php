<?php 
class Cliente{
		public $IdCliente;
		public $TipoDocumento;
        public $Nombre;
		public $Apellido;
        public $Telefono;
        public $Correo;
       
        
        
		

		
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				     $sql = "select * from cliente where IdCliente = '$this->IdCliente'";
				     $rs = mysqli_query($cone,$sql);
					 if(mysqli_fetch_array($rs))
								{
								echo "<script> alert('El Cliente ya existe en el sistema de Información')</script>";
								}								
								else{
									$insertar = "insert into cliente values('$this->IdCliente',
									                                        '$this->TipoDocumento',
                                                                            '$this->Nombre',
                                                                            '$this->Apellido',
                                                                            '$this->Telefono',
                                                                            '$this->Correo'
                                                                        
                                                                        
                                                                            )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El Cliente fue creado en el sistema de información')</script>";
								
								}									
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from cliente where IdCliente ='$this->IdCliente'";
									$resultado = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($resultado))
																{
																echo "<script> alert('El Cliente a Modificar ya existe')</script>";
																}
																else
																	{
																	$update = "update cliente set IdCliente = '$this->IdCliente',
																	                              TipoDocumento = '$this->TipoDocumento',
																	                              Nombre = '$this->Nombre',
																								  Apellido = '$this->Apellido',
																								  Telefono = '$this->Telefono',
																								  Correo = '$this->Correo',
																								  where IdCliente ='$this->IdCliente';
                                                                                                  ";
																	echo $update;							  
																	mysqli_query($cone,$update);
																	echo "<script> alert('El Cliente  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from cliente where IdCliente='$this->IdCliente'";
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
									$this->IdCliente = Null;
									$this->TipoDocumento = Null;
									$this->Nombre = Null;
                                    $this->Apellido = Null;
                                    $this->Telefono = Null;
                                    $this->Correo = Null;
                                    
                                    
									
				}

				

}
?>