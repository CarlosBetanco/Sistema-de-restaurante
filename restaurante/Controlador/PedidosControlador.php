<?php 
class Pedidos{
		public $IdPedido;
		public $FechaPedido;
        public $HoraPedido;
        public $IdCliente;
		public $IvaPedido;
		public $TotalPedido;
		

		
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				     $sql = "select * from pedidos where IdPedido = '$this->IdPedido'";
				     $rs = mysqli_query($cone,$sql);
					 if(mysqli_fetch_array($rs))
								{
								echo "<script> alert('El tipo orden ya existe en el sistema de Información')</script>";
								}								
								else{
									$insertar = "insert into pedidos values('$this->IdPedido',
                                                                            '$this->FechaPedido',
                                                                            '$this->HoraPedio',
                                                                            '$this->IdCliente',
																			'$this->IvaPedido',
																			'$this->TotalPedido'
                                                                    
                                                                            )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El tipo orden fue creado en el sistema de información')</script>";
								
								}									
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from pedidos where IdPedido ='$this->IdPedido'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																echo "<script> alert('El tipo orden a Modificar ya existe')</script>";
																}
																else
																	{
																	$id = "update pedidos set
																	       IdPedido = '$this->IdPedido',
																	       Precio = '$this->Precio',
                                                                           MontoFinal = '$this->MontoFinal',
                                                                           Descripcion ='$this->Descripcion',
                                                                           IdCliente = '$this->IdCliente', 
																		   IvaPeddido = '$this->IvaPeddido',  
																		   TotalPedido = '$this->TotalPedido'                                                                            
                                                                           where IdTipoOrden = '$this->IdTipoOrden'";

																    echo $update;
																    mysqli_query($cone,$update);
																	echo "<script> alert('El tipo orden  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from pedidos where IdPedido='$this->IdPedido'";
									if(mysqli_query($cone,$sql))
									{
									echo "<script> alert('El tipo orden fue Eliminado del Sistema de Información');</script>";
									}
										else
											{
											echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionados')</script>";
											}
								}
				
				function limpiar(){
									$this->IdPedido = Null;
									$this->FechaPedido = Null;
									$this->HoraPedido = Null;
									$this->IdCliente = Null;
				}

				

}
?>