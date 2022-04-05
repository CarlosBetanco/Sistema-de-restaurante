<?php include("../Conexion/conectar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vistas/css/font-awesome.min.css">
    <link rel="stylesheet" href="librerias/jquery-3.6.0.min.js">
    <title>Document</title>
</head>
<body>
    <div id="datos" class="col-lg-12" style="padding-top:20px">
    <h4 class=" text-danger font-weight-normal text-center" >Grafica de Productos</h4><br>
        <div class="row">
            <div class="col-lg-6">
                <canvas id="total" width="1000" height="800"></canvas>
            </div>    
        </div>
    </div>
    <br>
    </div> <button id="desaparece" class="btn btn-primary" onclick="imprimir(datos)">Imprimir</button>
 </body>
</html>
<script src="chart.min.js"></script>
<script>
new Chart(document.getElementById("total"), {
    type: 'bar',
    data: {
      labels: [

        <?php
           $c = new Conexion();
           $cone = $c->conectando();
           $sql= "select * from producto";
           $consulta = mysqli_query($cone,$sql);
           while($arreglo = mysqli_fetch_array($consulta)){

           
        ?>
        '<?php echo $arreglo["NombreProducto"];?>',
        <?php
              }
        ?>
      ],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
<script>
            function imprimir(){
                var obj  = document.getElementById("desaparece");
                obj.style.visibility="hidden";

                window.print();
            }
        </script>

        