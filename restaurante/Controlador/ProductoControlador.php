<?php 
class producto{
		public $IdProducto;
        public $NombreProducto;
		public $ValorProducto;
		public $IdCategorias;
        public $Cantidad;
		public $IvaProducto;
		public $TotalProductos;
		public $IdProveedor;
		public $ImagenProducto;
        
        
		

		
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				     $sql = "select * from producto where IdProducto = '$this->IdProducto'";
				     $rs = mysqli_query($cone,$sql);
					 if(mysqli_fetch_array($rs))
								{
								echo "<script> alert('El producto ya existe en el sistema de Información')</script>";
								}								
								else{
									$c = new Conexion();
									$cone = $c->conectando();
									$ruta='../img/'.$_FILES['ImagenProducto']['name'];
									move_uploaded_file($_FILES['ImagenProducto']['tmp_name'],$ruta);
									$insertar = "insert into producto values('$this->IdProducto',          
									                                        '$this->NombreProducto',
                                                                            '$this->ValorPoducto',
																			'$this->IdCategorias',
                                                                            '$this->Cantidad',
																			'$this->IvaProducto',
                                                                            '$this->TotalProductos',
																			'$this->IdProveedor',
                                                                            '$this->ImagenProducto',
																			'$ruta'
                                                                            )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El producto fue creado en el sistema de información')</script>";
								
								}									
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from producto where IdPoducto ='$this->IdProducto'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																echo "<script> alert('El producto a Modificar ya existe')</script>";
																}
																else
																	{
										    $update = "update producto set IdProducto ='$this->IdProducto'
                                                                           IdPoveedor = '$this->IdPoveedor',
																	       NombreProducto = '$this->NombreProducto',
                                                                           ValorProducto = '$this->ValorProducto',
																		   IdCategorias = '$this->IdCategorias',
                                                                           Cantidad = '$this->Cantidad',
																		   IvaProducto = '$this->IvaProducto',
																		   TotalProductos = '$this->TotalProductos',
																		   IdProveedor = '$this->IdProveedor',
																		   where IdProducto = '$this->IdProducto';
                                                                           ";
                                                                    echo $update;
																	mysqli_query($cone,$update);
																	echo "<script> alert('El producto  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from producto where IdProducto='$this->IdProducto'";
									if(mysqli_query($cone,$sql))
									{
									echo "<script> alert('El Producto fue Eliminado del Sistema de Información');</script>";
									}
										else
											{
											echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
											}
								}
				
				function limpiar(){
									$this->IdProducto = Null;
									$this->IdProveedor = Null;
									$this->NombreProducto = Null;
                                    $this->ValorProducto = Null;
									$this->IdCategorias = Null;
                                    $this->Cantidad = Null;
									$this->IvaProducto = Null;
									$this->TotalProductos = Null;
									$this->IdProveedor = Null;
									$this->ImagenProducto = Null;
                                    
									
				}

				
}
?>
