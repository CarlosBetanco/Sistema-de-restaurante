<?php
class proveedor{
                public $IdProveedor;
                public $Nombre;
                public $Telefono;
                public $Ciudad;
                public $Direccion;
                public $Descripcion;
                
                
                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select * from proveedor where IdProveedor = '$this->IdProveedor'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if($arreglo = mysqli_fetch_row($resultado)){

                                        echo"<script> alert('El proveedor ya Existe en el Sistema');</script>";

                                    }else{
                                        $insertar ="insert into proveedor values('$this->IdProveedor',
                                                                                 '$this->Nombre',
                                                                                 '$this->Telefono',
                                                                                 '$this->Cuidad',
                                                                                 '$this->Direccion',
                                                                                 '$this->Descripcion'
                                        echo $insertar;                                       )";
                                        mysqli_query($cone,$insertar);
                                        echo"<script> alert('El proveedor fue creado  en el Sistema');</script>";

                                    }


                }
                function modificar(){
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from proveedor where Ciudad ='$this->Ciudad'";
                    $r = mysqli_query($cone,$sql);
                    if(!mysqli_fetch_array($r))
                                                {
                                                echo "<script> alert('El proveedor a Modificar ya existe')</script>";
                                                }
                                                else
                                                    {
                                                    $update = "update proveedor set IdProveedor = '$this->IdProveedor',
                                                                                  Nombre = '$this->Nombre',
                                                                                  Telefono = '$this->Telefono',
                                                                                  Ciudad = '$this->Ciudad',
                                                                                  Direccion = '$this->Direccion',
                                                                                  Descripcion = '$this->Descripcion',
                                                                                  where Idproveedor='$this->IdProveedor';
                                                                                  ";
                                                    echo $update;							  
                                                    mysqli_query($cone,$update);
                                                    echo "<script> alert('El proveedor  fue Modificado ')</script>";				
                                                        
                                                }
                }
                function eliminar(){
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql= "delete from proveedor where IdProveedor='$this->IdProveedor'";
                    if(mysqli_query($cone,$sql))
                    {
                    echo "<script> alert('El proveedor fue Eliminado del Sistema de Información');</script>";
                    }
                        else
                            {
                            echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
                            }
                }

function limpiar(){
                    $this->IdProveedor = Null;
                    $this->Nombre = Null;
                    $this->Telefono = Null;
                    $this->Ciudad = Null;
                    $this->Direccion = Null;
                    $this->Descripcion = Null;
                    
                }

}
?>