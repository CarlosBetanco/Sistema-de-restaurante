<?php 
class PedidoDetalle{
	    public $IdPedidoDetalle;
	    public $IdPedido;
	    public $IdProducto;
		public $ValorUnitario;
		public $Cantidad;
		public $ValorDetalle;
		public $IvaDetalle;
        public $ValorTotal;
		
        
        
		
		

		
		
                 function agregar(){
					 $c = new Conexion();
					 $cone = $c->conectando();
				    						
									$insertar = "insert into pedido_detalle values('$this->IdPedidoDetalle',
									                                        '$this->IdPedido',
																			'$this->IdProducto',
																			'$this->ValorUnitario',
                                                                            '$this->Cantidad',
																			'$this->ValorDetalle',
																			'$this->IvaDetalle',
                                                                            '$this->ValorTotal'
                                                                             )";    
									echo $insertar;
									mysqli_query($cone,$insertar);	
									echo "<script> alert('El Producto fue creado en el sistema de información')</script>";
								
																
				 				
				 }
				 	
				

				function modificar(){
									$c = new Conexion();
								    $cone = $c->conectando();
									$sql = "select * from pedido_Detalle where Cantidad ='$this->Cantidad'";
									$r = mysqli_query($cone,$sql);
									if(!mysqli_fetch_array($r))
																{
																echo "<script> alert('El resultado a Modificar ya existe')</script>";
																}
																else
																	{
																	$id = "update pedido_Detalle set
																	       IdPedidoDetalle = '$this->IdPedidoDetalle',
																	       IdPedido = '$this->IdPedido',
																	       IdProducto = '$this->IdProducto',
																		   ValorUnitario = '$this->ValorUnitario',
																	       Cantidad = '$this->Cantidad',
																		   ValorTotal = '$this->ValorDetalle',
                                                                           IvaDetalle = '$this->IvaDetalle',
																		   ValorTotal = '$this->ValorTotal',
                                                                           where IdPedido = '$this->IdPedido'',
                                                                           ";
																    echo $update;
																	mysqli_query($cone,$update);
																	echo "<script> alert('El resultado  fue Modificado ')</script>";				
																		
																}
				}

				function eliminar(){
									$c = new Conexion();
									$cone = $c->conectando();
									$sql= "delete from pedido_detalle where IdPedidoDetalle='$this->IdPedidoDetalle'";
									if(mysqli_query($cone,$sql))
									{
									echo "<script> alert('El resultado fue Eliminado del Sistema de Información');</script>";
									}
										else
											{
											echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
											}
								}
				

}
?>