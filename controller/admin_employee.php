<?php
    require_once "conexion.php";
    require_once "admin_customer_crud.php";
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Panel de administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
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
          <p class="app-sidebar__user-name">Santiago Ospina</p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="../html/admin.html"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Estadisticas</span></a></li>
        
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="../controller/admin_customer.php" rel="noopener"><i class="icon fas fa-handshake"></i>Empleados</a></li>
              <li><a class="treeview-item" href="../controller/admin_customer.php"><i class="icon fa fa-users"></i>Clientes</a></li>
            </ul>
          </li>   
      
        <li><a class="app-menu__item" href="../controller/admin_reservations.php"><i class="app-menu__icon far fa-calendar-check"></i><span class="app-menu__label">Reservas</span></a></li>
        
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Registro de citas</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-handshake"></i> Empleados</h1>
        </div>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsert"><i class="fas fa-user-plus"></i> Añadir Empleado</button>
      </div>

      <div class="modal fade" id="modalInsert" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalTitle">Añadir Empleado</h5>
                </div>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                
                                    <form class="p-4 needs-validation" method="post" novalidate action="admin_employee_insert.php">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">N° Documento</label>
                                        <input type="text" class="form-control" name="id_usuario" required>
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cedula" class="form-label">Nombre Empleado</label>
                                        <input type="text" class="form-control" name="nombre_empleado" required>
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Telefono del Empleado</label>
                                        <input type="text" class="form-control" name="telefono_empleado" required>
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
                      <th>N° Documento</th>
                      <th>Nombres y Apellidos</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $obj= new methods();
                      $sql="SELECT id_empleado,documento_empleado,nombre_empleado,telefono_empleado FROM empleados";
                      $datos=$obj->showInfo($sql);
                      
                      foreach ($datos as $key){
                      ?>
                    <tr>
                      <td><?php echo $key['documento_empleado']; ?></td>
                      <td><?php echo $key['nombre_empleado']; ?></td>
                      <td><?php echo $key['telefono_empleado']; ?></td>
                      <td>

                      <div class="btn-group">
                      
                      <a href="admin_customer_update.php?id_cliente=<?php echo $key['id_empleado']; ?>"><div class="btn btn-outline-warning" data-bs-toggle="modal"><i class="fas fa-pen"></i></div></a>
                      
                      <div class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $key['documento_empleado']; ?>"><i class="fas fa-trash-alt"></i></div>

    <div class="modal fade" id="modalUpdate<?php echo $key['documento_empleado']; ?>" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalTitle">ADVERTENCIA</h5>
                </div>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                
                                    <p>Estas seguro que deseas eliminar este registro? (Se eliminara el usuario tambien)</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <a href="admin_customer_delete.php?documento_cliente=<?php echo $key['documento_empleado']; ?>"><div class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate">Si</div></a>
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
    <script src="https://kit.fontawesome.com/cca4c6ac96.js" crossorigin="anonymous"></script>
  </body>
</html>