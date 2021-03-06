<?php
    require_once "../model/conexion.php";
    require_once "../controller/admin_crud.php";
    
    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    if(!isset($id_usuario)){
      header("location:login.php");
    }
    ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Panel Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Nails Room</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
      <?php
          $obj= new methods();
          $sql="SELECT nombre_usuario,nombre_rol FROM usuario INNER JOIN rol ON usuario.rol_id=rol.id_rol WHERE id_usuario=$id_usuario;";
          $datos=$obj->showInfo($sql);                  
            foreach ($datos as $key){
              ?>
        <div>
          <p class="app-sidebar__user-name"><?php echo $key['nombre_usuario']?></p>
          <p class="app-sidebar__user-designation"><?php echo $key['nombre_rol']?></p>
          
        </div>
        <?php
      }
      ?>
      </div>
      
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="#"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Estadísticas</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="admin_employee.php" rel="noopener"><i class="icon fas fa-handshake"></i>Empleados</a></li>
            <li><a class="treeview-item" href="admin_customer.php"><i class="icon fa fa-users"></i>Clientes</a></li>
            
          </ul>
        </li>
      
        <li><a class="app-menu__item" href="admin_reservations.php"><i class="app-menu__icon far fa-calendar-check"></i><span class="app-menu__label">Reservas</span></a></li>
        <li><a class="app-menu__item" href="admin_services.php"><i class="app-menu__icon fas fa-paint-brush"></i><span class="app-menu__label">Servicios</span></a></li>
        <li><a class="app-menu__item" href="admin_category.php"><i class="app-menu__icon fab fa-elementor"></i><span class="app-menu__label">Categorias</span></a></li>
        <li><a class="app-menu__item" href="admin_reservations_history.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Registro de citas</span></a></li>
        <li><a class="app-menu__item" href="../index.html"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Volver al Inicio</span></a></li>
        <li><a class="app-menu__item" href="../controller/close_session.php"><i class="app-menu__icon fa fa-sign-out-alt"></i><span class="app-menu__label">Cerrar sesion</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-chart-line"></i> Estadísticas</h1>
        </div>
      </div>
      <div class="row">
      <?php
        $obj= new methods();
        $sql="SELECT * from showstatsc;";
        // $sql "SELECT COUNT(*) AS total_clientes FROM clientes";
        $datos=$obj->showInfo($sql);
        
        foreach ($datos as $key){
        ?>
      
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>CLIENTES</h4>
              <p><b><?php echo $key['TOTAL_CLIENTES']; ?></b></p>
            </div>
          </div>
          <?php
          };
          $obj= new methods();
          $sql="SELECT * from showstatse;";
          $datos=$obj->showInfo($sql);
            foreach ($datos as $key){
          ?>
  
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class=" icon fas fa-handshake"></i>
            <div class="info">
              <h4>EMPLEADOS</h4>
              <p><b><?php echo $key['TOTAL_EMPLEADOS']; ?></b></p>
            </div>
          </div>
          <?php
          };
          $obj= new methods();
          $sql="SELECT * from showstatscitas;";
          $datos=$obj->showInfo($sql);
            foreach ($datos as $key){
          ?>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fas fa-hand-sparkles"></i>
            <div class="info">
              <h4>SERVICIOS REALIZADOS</h4>
              <p><b><?php echo $key['TOTAL_CITAS']; ?></b></p>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title color-title">Ventas Mensuales </h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title color-title">Servicios más vendidos</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
      	datasets: [
      		{
      			label: "Primer linea",
      			fillColor: "rgba(94, 4, 46, 0.39)",
      			strokeColor: "rgba(94, 4, 46, 1)",
      			pointColor: "white",
      			pointStrokeColor: "gray",
      			pointHighlightFill: "rgba(94, 4, 46, 0.69)",
      			pointHighlightStroke: "rgba(94, 4, 46, 0.69)",
      			data: [0, 59, 80, 81, 56, 60, 59, 80, 81, 56, 30, 190]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 120,
      		color: "rgba(94, 4, 46, 0.6)",
      		highlight: "rgba(94, 4, 46, 1)",
      		label: "Manicure"
      	},
      	{
      		value: 90,
      		color:"rgba(94, 4, 46, 0.7)",
      		highlight: "rgba(94, 4, 46, 1)",
      		label: "Pedicure"
      	},
        {
      		value: 40,
      		color:"rgba(94, 4, 46, 0.8)",
      		highlight: "rgba(94, 4, 46, 1)",
      		label: "Uñas semipermanentes"
      	},
        {
      		value: 53,
      		color:"rgba(94, 4, 46, 0.9)",
      		highlight: "rgba(94, 4, 46, 1)",
      		label: "Uñas forradas"
      	},
        {
      		value: 29,
      		color:"rgba(94, 4, 46, 0.5)",
      		highlight: "rgba(94, 4, 46, 1)",
      		label: "Uñas en acrilico"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    <!-- <script src="https://kit.fontawesome.com/cca4c6ac96.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/989850f707.js" crossorigin="anonymous"></script>
  </body>
</html>