<?php
class promocion{
                public $IdPromocion;
                public $IdProducto;
                public $Nombre;
                public $Detalle;
                public $Fecha_Inicio;
                public $Fecha_Fin;
                public $ValorPromocion;
                
                

                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select * from promocion where Nombre = '$this->Nombre'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if(mysqli_fetch_row($resultado)){

                                        echo"<script> alert('La promocion ya Existe en el Sistema');</script>";

                                    }else{
                                        $agregar ="insert into promocion values('$this->IdPromocion',
                                                                                    '$this->IdProducto',
                                                                                    '$this->Nombre',
                                                                                    '$this->Detalle',
                                                                                    '$this->Fecha_Inicio',
                                                                                    '$this->Fecha_Fin',
                                                                                    '$this->ValorPromocion'
                                        echo  $generar;                              )";
                                        mysqli_query($cone,$generar);
                                        echo"<script> alert('La promocion fue creada  en el Sistema');</script>";

                                    }


                }
                function modificar(){

                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from promocion where Nombre = '$this->Nombre'";
                    $r = mysqli_query($cone,$sql);
                    if(!mysqli_fetch_row($r)){

                        echo"<script> alert('La Promocion ya Existe en el Sistema');</script>";

                    }else{
                        $update ="update promocion set IdPromocion = '$this->IdPromocion',
                                                              IdProducto = '$this->IdProducto'
                                                              Nombre = '$this->Nombre', 
                                                              Detalle = '$this->Detalle',
                                                              Fecha_Inicio = '$this->Fecha_Inicio',
                                                              Fecha_Fin = '$this->Fecha_Fin',
                                                              ValorPromocion = '$this->ValorPromocion'
                                                              where IdPromocion = '$this->IdPromocion';
                                                              ";
                        echo $update;
                        mysqli_query($cone,$update);
                        echo"<script> alert('La promocion fue modificada  en el Sistema');</script>";

                    }

                }
                function eliminar(){

                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from promocion where Nombre = '$this->Nombre'";
                    if($arreglo = mysqli_query($cone,$delete)){

                        echo"<script> alert('La Promocion ya Existe en el Sistema');</script>";

                    }else{
                        $insertar ="insert into promocion values('','$this->IdPromocion','$this->IdProducto'";
                        mysqli_query($cone,$insertar);
                        echo"<script> alert('La Promocion fue eliminada  en el Sistema');</script>";

                    }

                }

                    function limpiar(){
                        $this->IdPromocion = Null;
                        $this->IdProducto = Null;
                        $this->Nombre = Null;
                        $this->Detalle = Null;
                        $this->Fecha_Inicio = Null;
                        $this->Fecha_Fin = Null;
                        $this->ValorPromocion = Null;
                        
                }

            }