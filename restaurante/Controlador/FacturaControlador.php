<?php
 class Factura{
    public $IdFactura;
    public $IdPedido;
    public $IdTipoPago; 
    public $Fecha;
    public $CostEnvio;
    public $IvaFactua;
    public $ValorFactura;
 
      
 

                function generar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select *  from Factura where IdFactura = '$this->IdFactura%'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if(mysqli_fetch_row($resultado)){

                                        echo"<script> alert('La factura  ya Existe en el Sistema');</script>";

                                    }else{
                                        
                                      $generar ="insert into factura values('$this->IdFactura',
                                                                            '$this->IdPedido',
                                                                            '$this->IdTipoPago',
                                                                            '$this->Fecha',
                                                                            '$this->CostEnvio',
                                                                            '$this->IvaFactura',
                                                                            '$this->ValorFactura')";
                                         echo  $generar;
                                        mysqli_query($cone,$generar);
                                        echo"<script> alert('La factura fue creada  en el Sistema');</script>";

                                    }


                }
                function editar(){
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from Factura where IdFactura = '$this->IdFactura'";
                    $resultado = mysqli_query($cone,$sql);
                    if(!mysqli_fetch_row($resultado)){

                        echo"<script> alert('La factra ya Existe en el Sistema');</script>";

                    }else{
                        $editar ="update Factura set IdFactura ='$this->IdFactura',
                                                        IdTipoOrden = '$this->IdPedido',
                                                        IdTipoPago = '$this->IdTipoPago',
                                                        Fecha = '$this->Fecha',
                                                        CostEnvio = '$this->CostEnvio',
                                                        IvaFactura = '$this->IvaFactura',
                                                        ValorFactura = '$this->ValorFactura'
                                                        where IdFactura ='$this->IdFactura';
                                                       ";
                        echo $editar;
                        mysqli_query($cone,$editar);
                        echo"<script> alert('La factura ya fue modificada  en el Sistema');</script>";
                    }

                }
                function cancelar(){ 
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $cancelar= "delete from  Factura where  IdFactura ='$this->IdFactura'";
                    if(mysqli_query($cone,$cancelar)){
                            echo"<script> alert('La factura fue eliminada  en el Sistema');</script>";
                    }else{
                        echo"<script> alert('La factura no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
                    }       

                }



            }



?>