<?php
 class tipopago{
    public $IdTipoPago;
    public $Descripcion_Pago;
   
 

                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select *  from TipoPago where Descripcion_Pago = '$this->Descripcion_Pago%'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if($arreglo =mysqli_fetch_row($resultado)){

                                        echo"<script> alert('El pago ya Existe en el Sistema');</script>";

                                    }else{
                                        
                                      $insertar ="insert into tipopago values('$this->IdTipoPago',
                                                                              '$this->Descripcion_Pago')";
                                       echo  $insertar;
                                        mysqli_query($cone,$insertar);
                                        echo"<script> alert('El pago fue creado  en el Sistema');</script>";

                                    }


                }
              
              
              
                      function modificar(){
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from TipoPago where IdTipoPago = '$this->IdTipoPago'";
                    $resultado =mysqli_query($cone,$sql); 
                    if(!mysqli_fetch_row($resultado)){

                        echo"<script> alert('El pago ya Existe en el Sistema');</script>";

                    }else{
                        $update ="update TipoPago set IdTipoPago ='$this->IdTipoPago',
                                                        Descripcion_Pago = '$this->Descripcion_Pago'
                                                        where IdTipoPago ='$this->IdTipoPago';
                                                         ";
                        echo $update;
                        mysqli_query($cone,$update);
                        echo"<script> alert('El pago  fue Modificado  en el Sistema');</script>";
                    }

                }
                function eliminar(){ $c = new Conexion();
                    $cone = $c->conectando();
                    $delete = "delete from  TipoPago where IdTipoPago ='$this->IdTipoPago'";
                    if(mysqli_query($cone,$delete)){
                            echo"<script> alert('El  pago fue eliminado  en el Sistema');</script>";
                    }else{
                        echo"<script> alert('El pago no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
                    }       

                }



            }



?>