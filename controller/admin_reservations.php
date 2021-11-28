<?php
    require_once "conexion.php";
    require_once "admin_crud.php";

    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    if(!isset($id_usuario)){
      header("location:login.php");
    }
    $obj= new methods();
    $sql="SELECT nombre_empleado FROM empleados WHERE documento_empleado=$id_usuario;";
    $datos=$obj->showInfo($sql);                  
      foreach ($datos as $key){

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Reservaciones</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/12fc8d1c07.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Nails Room</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
        <p class="app-sidebar__user-name"><?php echo $key['nombre_empleado']?></p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <?php
      }
      ?>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="admin.php"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Estadisticas</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="admin_employee.php" rel="noopener"><i class="icon fas fa-handshake"></i>Empleados</a></li>
              <li><a class="treeview-item" href="admin_customer.php"><i class="icon fa fa-users"></i>Clientes</a></li>
            </ul>
          </li>   
      
        <li><a class="app-menu__item active" href="#"><i class="app-menu__icon far fa-calendar-check"></i><span class="app-menu__label">Reservas</span></a></li>
        
        <li><a class="app-menu__item" href="admin_reservations_history.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Registro de citas</span></a></li>
        <li><a class="app-menu__item" href="../index.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Volver al Inicio</span></a></li>
        <li><a class="app-menu__item" href="close_session.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Cerrar sesion</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="far fa-calendar-check"></i> Reservaciones</h1>
        </div>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsert"><i class="fas fa-user-plus"></i> Añadir Reserva</button>

        <div class="modal fade" id="modalInsert" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="modalTitle">Añadir Reservacion</h5>
            </div>
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            
                                <form class="p-4 needs-validation" method="post" novalidate action="admin_customer_insert.php">
                                  
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="text" class="form-control" name="id_usuario" id="demoDate"  required>
                                    <div class="valid-feedback">Datos correctos</div>
                                    <div class="invalid-feedback">Complete los datos solicitados.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="hora" class="form-label">Hora</label>
                                    <select class="form-control" aria-label="Default select example" required>
                                      <option selected>Seleccione...</option>
                                      <option value="1">9:00 a.m</option>
                                      <option value="2">10:00 a.m</option>
                                      <option value="3">11:00 a.m</option>
                                      <option value="4">12:00 p.m</option>
                                      <option value="5">1:00 p.m</option>
                                      <option value="6">2:00 p.m</option>
                                      <option value="7">3:00 p.m</option>
                                      <option value="8">4:00 p.m</option>
                                      <option value="9">5:00 p.m</option>
                                    </select>
                                    <div class="valid-feedback">Datos correctos</div>
                                    <div class="invalid-feedback">Complete los datos solicitados.</div>
                                </div>
                                
                                <div class="mb-3">
                                
                                    <label for="servicios" class="form-label">Servicio</label>
                                    <select class="form-control" aria-label="Default select example" multiple="" id="demoSelect" required>
                                      <optgroup label="Servicios">
                                      <?php
                                  $obj= new methods();
                                  
                                  $sql= "SELECT nombre_servicio FROM servicios";
                                  $datos=$obj->showInfo($sql);
                                  
                                  foreach ($datos as $key){
                                  ?>
                                        <option value=<?php echo $key['nombre_servicio']?> ><?php echo $key['nombre_servicio']?></option>  
                                      </optgroup>   
                                      <?php
                                      }
                                      ?>                   
                                    </select>
                                    
                                    <div class="valid-feedback">Datos correctos</div>
                                    <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    
                                </div>  -->

                                <!-- <div class="mb-3">
                                  <label for="empleados" class="form-label">Clientes</label>
                                  <select class="form-control js-example-basic-single" aria-label="Default select example" id="demoSelect1" required>
                                    <option selected>Seleccione un cliente...</option>
                                    <?php
                                  $obj= new methods();
                                  
                                  $sql= "SELECT nombre_cliente FROM clientes";
                                  $datos=$obj->showInfo($sql);
                                  
                                  foreach ($datos as $key){
                                  ?>
                                        <option value=<?php echo $key['nombre_cliente']?> ><?php echo $key['nombre_cliente']?></option>  
                                      <?php
                                      }
                                      ?>
                                  </select>
                                  <div class="valid-feedback">Datos correctos</div>
                                  <div class="invalid-feedback">Complete los datos solicitados.</div>
                              </div>                         -->
                              <select class="form-control" id="demoSelect">
                <optgroup label="Select Cities">
                  <option>Ahmedabad</option>
                  <option>Surat</option>
                  <option>Vadodara</option>
                  <option>Rajkot</option>
                  <option>Bhavnagar</option>
                  <option>Jamnagar</option>
                  <option>Gandhinagar</option>
                  <option>Nadiad</option>
                  <option>Morvi</option>
                  <option>Surendranagar</option>
                  <option>Junagadh</option>
                  <option>Gandhidham</option>
                  <option>Veraval</option>
                  <option>Ghatlodiya</option>
                  <option>Bharuch</option>
                  <option>Anand</option>
                  <option>Porbandar</option>
                  <option>Godhra</option>
                  <option>Navsari</option>
                  <option>Dahod</option>
                  <option>Botad</option>
                  <option>Kapadwanj</option>
                </optgroup>
              </select>
                              <div class="mb-3">
                                  <label for="empleados" class="form-label">Empleado</label>
                                  <select class="form-control" aria-label="Default select example" required>
                                  <option selected>Seleccione un cliente...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    
                                  </select>
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
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>N° Reservación</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Servicio</th>
                      <th>Cliente</th>
                      <th>Empleado</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $obj= new methods();
                      
                      $sql= "SELECT id_cita, fecha_cita, hora_cita, nombre_servicio, nombre_cliente,  nombre_empleado, total
                      from citas join servicios on citas.id_servicio=servicios.id_servicio
		                  join clientes on citas.id_cliente=clientes.id_cliente
                      join empleados on citas.id_empleado=empleados.id_empleado";
                      $datos=$obj->showInfo($sql);
                      
                      foreach ($datos as $key){
                      ?>
                    <tr>
                      <td><?php echo $key['id_cita'] ?></td>
                      <td><?php echo $key['fecha_cita'] ?></td>
                      <td><?php echo $key['hora_cita'] ?></td>
                      <td><?php echo $key['nombre_servicio'] ?></td>
                      <td><?php echo $key['nombre_cliente'] ?></td>
                      <td><?php echo $key['nombre_empleado'] ?></td>
                      <td><?php echo $key['total'] ?></td>
                      <td>
                          <div class="text-center">
                              <div class="btn-group">
                                  <div class="btn btn-outline-warning">
                                      <i class="fas fa-pen"></i>
                                    </div>
                              </div>
                              <div class="btn btn-outline-danger">
                                  <i class="fas fa-trash-alt"></i>
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
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="https://kit.fontawesome.com/cca4c6ac96.js" crossorigin="anonymous"></script>
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

    <script type="text/javascript" src="../js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="../js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dropzone.js"></script>
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
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
    
  </body>
</html>