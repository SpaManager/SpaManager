<?php
    require_once "../model/conexion.php";
    require_once "../controller/admin_crud.php";

    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    if(!isset($id_usuario)){
      header("location:login.php");
    }
    $obj= new methods();
    $sql="SELECT nombre_usuario,nombre_rol FROM usuario INNER JOIN rol ON usuario.rol_id=rol.id_rol WHERE id_usuario=$id_usuario;";
    $datos=$obj->showInfo($sql);                  
      foreach ($datos as $key){

    ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Panel de administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
    <script src="https://kit.fontawesome.com/12fc8d1c07.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
        <div>
        <p class="app-sidebar__user-name"><?php echo $key['nombre_usuario']?></p>
          <p class="app-sidebar__user-designation"><?php echo $key['nombre_rol']?></p>
        </div>
      </div>
      
      <?php 
      }
      ?>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="admin.php"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Estadísticas</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="admin_employee.php" rel="noopener"><i class="icon fas fa-handshake"></i>Empleados</a></li>
            <li><a class="treeview-item" href="admin_customer.php"><i class="icon fa fa-users"></i>Clientes</a></li>
            
          </ul>
        </li>
      
        <li><a class="app-menu__item active" href="admin_reservations.php"><i class="app-menu__icon far fa-calendar-check"></i><span class="app-menu__label">Reservas</span></a></li>

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
          <h1><i class="app-menu__icon far fa-calendar-check"></i></i> Reservas</h1>
        </div>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsert"><i class="fas fa-user-plus"></i> Añadir Reserva</button>
      </div>

    <div class="modal fade" id="modalInsert" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalTitle">Añadir Reserva</h5>
                </div>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                
                                    <form class="p-4 needs-validation" method="post" novalidate action="../controller/admin_reservations_insert.php">
        
                                    <div class="mb-3">
                                      <label for="exampleSelect1">Escriba el nombre del Empleado</label>
                                      
                                      <select class="form-control" id="select" multiple="" name="empleado_id">
                                      <?php
                                        $obj = new methods();
                                        $sql1="SELECT id_usuario,nombre_usuario FROM usuario WHERE rol_id=2";
                                        $datos=$obj->showInfo($sql1);                  
                                          foreach ($datos as $key){ 
                                        ?>

                                          <option value="<?php echo $key['id_usuario'] ?>"><?php echo $key['nombre_usuario'] ?></option>
                                        <?php 
                                          }
                                        ?>
                                      </select>

                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>

                                    <div class="mb-3">
                                      <label for="exampleSelect1">Escriba el nombre del Cliente</label>
                                      
                                      <select class="form-control" id="select1" multiple="" name="cliente_id">
                                      <?php
                                        $obj = new methods();
                                        $sql1="SELECT id_usuario,nombre_usuario FROM usuario WHERE rol_id=3";
                                        $datos=$obj->showInfo($sql1);                  
                                          foreach ($datos as $key){ 
                                        ?>

                                          <option value="<?php echo $key['id_usuario'] ?>"><?php echo $key['nombre_usuario'] ?></option>
                                        <?php 
                                          }
                                        ?>
                                      </select>

                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de la cita</label>
                                        <input class="form-control" id="demoDate" type="text" placeholder="Select Date" name="fecha_cita">
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Hora de la cita</label>
                                        <input type="time" class="form-control" name="hora_cita" required>                                       
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div> 

                                                                                                                                                  
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary float-right">Enviar</button>
                                        
                                </form>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Fecha de la cita</th>
                      <th>Hora de la cita</th>
                      <!-- <th>Duracion total de la cita</th> -->
                      <th>Nombre del cliente</th>
                      <th>Nombre del empleado</th>
                      <!-- <th>Total a pagar</th> -->
                      <th>Estado de la cita</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $obj= new methods();
                      $sql="SELECT id_cita,fecha_cita,hora_cita,nombre_usuario,cliente_id FROM cita INNER JOIN usuario ON cita.empleado_id=usuario.id_usuario";
                      $datos=$obj->showInfo($sql);
                      
                      foreach ($datos as $key){
                      ?>
                    <tr>
                      <td><?php echo $key['fecha_cita']; ?></td>
                      <td><?php echo $key['hora_cita']; ?></td>
                      
                      
                      <?php
                      $cliente_id=$key['cliente_id'];
                      $obj= new methods();
                      $sql1="SELECT nombre_usuario FROM usuario WHERE id_usuario=$cliente_id";
                      $datos1=$obj->showInfo($sql1);
                      
                      foreach ($datos1 as $key1){
                      ?>
                      <td><?php echo $key1['nombre_usuario']; ?></td>
                      <?php 
                      }
                      ?>
                      <td><?php echo $key['nombre_usuario']; ?></td>
                      <td>Reservado</td>
                      <td>
                      <div class="btn-group">
                      
                      <a href="admin_reservations_update.php?id_cita=<?php echo $key['id_cita']; ?>"><div class="btn btn-outline-warning" data-bs-toggle="modal"><i class="fas fa-pen"></i></div></a>
                      
                      <div class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo $key['id_cita']; ?>"><i class="fas fa-trash-alt"></i></div>

    <div class="modal fade" id="modalDelete<?php echo $key['id_cita']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalTitle">ADVERTENCIA</h5>
                </div>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                
                                    <p>Estas seguro que deseas eliminar esta reserva?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <a href="../controller/admin_reservations_delete.php?id_cita=<?php echo $key['id_cita']; ?>"><div class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate">Si</div></a>
                            <button type="button" class="btn btn-primary float-left" data-bs-dismiss="modal">No</button>

                        </div>
                </div>
            </div>

        </div>
    </div>

                      </div>

                      </td>
                    </tr>
                    <?php
                      }
                    ?>  

                  </tbody>
                </table>
              </div>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script>
   $("#select").select2({
  maximumSelectionLength: 1
});
$("#select1").select2({
  maximumSelectionLength: 1
});

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
    <script type="text/javascript">
      $('#sl').on('click', function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').on('click', function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "yyyy/mm/dd",
      	autoclose: true,
      	todayHighlight: true
      });
      
    </script>
    <script>
      
      (function () {
      'use strict'
  
      
      var forms = document.querySelectorAll('.needs-validation')
  
    
      Array.prototype.slice.call(forms)
          .forEach(function (form) {
          form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
              }
  
              form.classList.add('was-validated')
          }, false)
          })
      })()
      </script>
    <script src="https://kit.fontawesome.com/cca4c6ac96.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    
  </body>
</html>