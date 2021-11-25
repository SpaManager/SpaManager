<?php
    require_once "conexion.php";
    require_once "admin_customer_crud.php";
    ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Panel de administrador</title>
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
          <p class="app-sidebar__user-name">Santiago Ospina</p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="../html/admin.html"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Estadísticas</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="../html/admin_workers.html" rel="noopener"><i class="icon fas fa-handshake"></i>Empleados</a></li>
            <li><a class="treeview-item active" href="../html/admin_customer.html"><i class="icon fa fa-users"></i>Clientes</a></li>
            
          </ul>
        </li>
      
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon far fa-calendar-check"></i><span class="app-menu__label">Reservas</span></a></li>
        
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Registro de citas</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> Clientes</h1>
        </div>
        
      </div>
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsert"><i class="fas fa-user-plus"></i></button>

    <div class="modal fade" id="modalInsert" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalTitle">Añadir Cliente</h5>
                </div>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                
                                    <form class="p-4 needs-validation" method="post" novalidate action="admin_customer_insert.php">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">N° Documento</label>
                                        <input type="text" class="form-control" name="id_usuario" required>
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cedula" class="form-label">Nombre Cliente</label>
                                        <input type="text" class="form-control" name="nombre_cliente" required>
                                        <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Telefono del Cliente</label>
                                        <input type="text" class="form-control" name="telefono_cliente" required>
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
                      $sql="SELECT id_cliente,documento_cliente,nombre_cliente,telefono_cliente FROM clientes";
                      $datos=$obj->showInfo($sql);
                      
                      foreach ($datos as $key){
                      ?>
                    <tr>
                      <td><?php echo $key['documento_cliente']; ?></td>
                      <td><?php echo $key['nombre_cliente']; ?></td>
                      <td><?php echo $key['telefono_cliente']; ?></td>
                      <td>

                      <div class="btn-group">
                      
                      <a href="admin_customer_update.php?id_cliente=<?php echo $key['id_cliente']; ?>"><div class="btn btn-outline-warning" data-bs-toggle="modal"><i class="fas fa-pen"></i></div></a>

                        <div class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
  </body>
</html>