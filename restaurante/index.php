<?php 
 include('Conexion/conectar.php');

session_start();

    $varsesion = $_SESSION['NombreUsuario'];
    $c = new Conexion();
    $cone = $c->conectando();	
    $sql1 = "select roles.IdRol from usuarios INNER JOIN roles on usuarios.IdRol = roles.IdRol where usuarios.NombreUsuario = '$varsesion' ";
    $rs1 = mysqli_query($cone,$sql1);
    $arreglo1 = mysqli_fetch_row($rs1);
    
    if($arreglo1[0] != 1 and $arreglo1[0]!=5 ){
   
        echo 'UD NO TIENE AUTORIZACION ';
     
    die();
    }
   if($varsesion=="")
    {
      header("location:RolUsuario.php");
    }
?>

<?php
                                            $c = new Conexion();
                                            $cone = $c->conectando();	
                                            $sql1 = "select roles.NombreRol from usuarios INNER JOIN roles on usuarios.IdRol = roles.IdRol where usuarios.NombreUsuario = '$varsesion' ";
                                            $rs1 = mysqli_query($cone,$sql1);
                                            $arreglo1 = mysqli_fetch_row($rs1);
                                            echo $arreglo1[0];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  
		
	</script>
  
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Restau<span>rante</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          
            
          
          <!-- settings end -->
          <!-- inbox dropdown start-->
          
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Cerar Sesion</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p><br>
          <h5 class="centered">
            <span>
									<?php echo $varsesion; ?>
									<span class="user-level"><br><?php echo $arreglo1[0]; ?><hr>
                </span>
                  
									
							</span>
            </h5>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-dashboard" ></i>
              <span>Acministrativo</span>
              </a>
              <ul class="sub">
              <li><a href="Vistas/Proyecto prototipo/index.php" target="Marco">Acministracion</a></li>
                <li><a href="Vistas/Proveedor.php" target="Marco">Proveedores</a></li>
                <li><a href="Vistas/Categorias.php" target="Marco">Categorias</a></li>
              </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="9" cy="7" r="4" />
  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
</svg></i>
              <span>Cliente</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/Cliente.php" target ="Marco" >Clientes</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Ordenes</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/PedidosAgregar.php" target="Marco">Orden</a></li>
        
            </ul>

          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Facturas</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/Factura.php" target="Marco">Factura</a></li>
              <li><a href="Vistas/TipoPago.php" target="Marco">Tipo Pago</a></li>
              <li><a href="Vistas/Pedidos1.php" target="Marco">Pedidos</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Producto</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/Producto.php" target="Marco">Producto</a></li>
              <li><a href="Vistas/Promocion.php" target="Marco">Promociones</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Registro de ususarios</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/Usuarios.php" target ="Marco" >Usuarios</a></li>
              <li><a href="Vistas/Roles.php" target ="Marco" >Roles</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="22" height="22" viewBox="0 0 24 24" stroke-width="3" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
  <path d="M18 14v4h4" />
  <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
  <rect x="8" y="3" width="6" height="4" rx="2" />
  <circle cx="18" cy="18" r="4" />
  <path d="M8 11h4" />
  <path d="M8 15h3" />
</svg></i>
              <span>Reportes</span>
              </a>
            <ul class="sub">
              <li><a href="Reportes/ListadoClientes.php" target ="Marco" >Clientes</a></li>
              <li><a href="Reportes/ListadoProveedores.php" target ="Marco">Proveedores</a></li>
              <li><a href="Reportes/ListadoFactura.php" target ="Marco">Facturas</a></li>
              <li><a href="Reportes/ListadoProductos.php" target ="Marco">Productos</a></li>
              <li><a href="Reportes/ListadoCategorias.php" target ="Marco">Categorias</a></li>
            </ul>
          </li>
             <li class="sub-menu">
              <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i>
              <span>Graficas </span>
              </a>
              <ul class="sub">
                <li><a href="Graficas/graficaProductos.php" target ="Marco" >Productos</a></li>
                <li><a href="Graficas/GreaficaDetalle.php" target ="Marco" >Productos Detalle</a></li>
                <li><a href="Graficas/GraficaCategoria.php" target ="Marco" >Categorias</a></li>
              </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <rect x="8" y="8" width="12" height="12" rx="2" />
  <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
</svg></i>
              <span>Copias BD</span>
              </a>
            <ul class="sub">
              <li><a href="Vistas/backup.php"  target ="Marco">Generar Copia</a></li>
              
            </ul>
          </li>
          <li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-question-mark" width="23" height="23" viewBox="0 0 24 24" stroke-width="3" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" />
  <line x1="12" y1="19" x2="12" y2="19.01" />
</svg></i>
              <span>Asistencia </span>
              </a>
              <ul class="sub">
              <li><a href="./Manuales/MANUAL DE USUARIO PARA EL SISTEMA DE INFORMACION.pdf">Manual de Usuario</a></li>
              <li><a href="./Manuales/MANUAL DE OPERACIONES.pdf">Manual de Operacion</a></li>
              </ul>
            </li>
        
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <iframe  src="Vistas/Proyecto prototipo/index.php"  frameborder="1" width="100%" height="900"  name="Marco"></iframe>
    
    <!--footer end--> 
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Developed by <a href="http://alvarez.is" target="_blank" style="color:#4ECDC4">Alvarez.is</a>.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
