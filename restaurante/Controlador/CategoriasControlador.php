<?php
 class Categorias{
    public $IdCategorias;
    public $NombreCategoria;
   
 

                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select *  from categorias where NombreCategoria = '$this->NombreCategoria%'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if($arreglo =mysqli_fetch_row($resultado)){

                                        echo"<script> alert('La categoria ya Existe en el Sistema');</script>";

                                    }else{
                                        
                                      $insertar ="insert into categorias values('$this->IdCategorias',
                                                                              '$this->NombreCategoria')";
                                       echo  $insertar;
                                        mysqli_query($cone,$insertar);
                                        echo"<script> alert('La categoria fue creada  en el Sistema');</script>";

                                    }


                }
              
              
              
                      function modificar(){
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $sql = "select * from categorias where Idcategorias = '$this->IdCategorias'";
                    $resultado =mysqli_query($cone,$sql); 
                    if(!mysqli_fetch_row($resultado)){

                        echo"<script> alert('La categoria ya Existe en el Sistema');</script>";

                    }else{
                        $update ="update categorias set IdCategorias ='$this->IdCategorias',
                                                        NombreCategoria = '$this->NombreCategoria'
                                                        where IdCategorias ='$this->IdCategorias';
                                                         ";
                        echo $update;
                        mysqli_query($cone,$update);
                        echo"<script> alert('La categoria fue Modificada  en el Sistema');</script>";
                    }

                }
                function eliminar(){ $c = new Conexion();
                    $cone = $c->conectando();
                    $delete = "delete from  categorias where IdCategorias ='$this->IdCategorias'";
                    if(mysqli_query($cone,$delete)){
                            echo"<script> alert('La categoria fue eliminada  en el Sistema');</script>";
                    }else{
                        echo"<script> alert('La categoria no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
                    }       

                }



            }



?>