<?php
    include("base.php");

    if(isset($_GET['IdCliente'])){
        $id = $_GET['IdCliente'];
        $query = "SELECT * FROM usuarios WHERE IdCliente =$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id = $row['IdCliente'];
            $Documento = $row['Documento'];
            $Rol = $row['Rol'];
            $Nombre = $row['Nombre'];
            $Apellidos = $row['Apellidos'];
            $Telefono = $row['Telefono'];
            $Direccion = $row['Direccion'];
            $Correo = $row['Correo'];
            $Contraseña = $row['Contraseña'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['IdCliente'];
        $Documento = $_POST['Documento'];
        $Rol = $_POST['Rol'];
        $Nombre = $_POST['Nombre'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contraseña'];

        $query = "UPDATE cliente SET IdCliente = '$id', Documento = '$Documento', Rol = '$Rol', Nombre = '$Nombre', Apellidos = '$Apellidos', Telefono = '$Telefono', Direccion = '$Direccion', Correo = '$Correo', Contraseña = 'Contraseña' WHERE IdCliente  = $id;";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container" p-4>
    <div class="row">
       <div class=".col-md-4 mx-auto">
           <div class="card card-body">
               <form action="edit.php?IdRol=<?php echo $_GET['IdCliente']; ?> "method="POST">

               <div class="form-group">
            <input type="num" name="id" class="form-control" placeholder="Identificacion del cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Documento" class="form-control" placeholder="Documento de identidad" autofocus>
          </div>
          <div class="form-group">
            <input type="num" name="Rol" class="form-control" placeholder="Identificacion del rol" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre del usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos del usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="num" name="Telefono" class="form-control" placeholder="Telefono o celular" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Direccion" class="form-control" placeholder="Direccion del domicilio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Correo" class="form-control" placeholder="Correo" autofocus>
          </div>
          <div class="form-group">
            <input type="pasword" name="Contraseña" class="form-control" placeholder="Contraseña" autofocus>
          </div>
                   <button class = "btn btn-success" name="update">
                       Actualizar
                   </button>
               </form>
           </div>
       </div>
    </div>
</div>

<?php include("includes/footer.php") ?>