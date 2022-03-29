<?php
require_once "../model/conexion.php";
require_once "../controller/admin_crud.php";
$obj = new connect();
$conexion=$obj->conexion();
$id_cita=$_GET['id_cita'];
$sql="SELECT id_cita,fecha_cita,hora_cita,cliente_id,nombre_usuario,empleado_id FROM cita INNER JOIN usuario ON cita.cliente_id=usuario.id_usuario WHERE id_cita=$id_cita";
$result=mysqli_query($conexion,$sql);
$show=mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/12fc8d1c07.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    
    <title>Editar Datos</title>

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Editar datos:
                    </div>
                    <form class="p-4 needs-validation" method="post" action="../controller/admin_reservations_update1.php" novalidate>
                    <div class="mb-3">
                        <input type="text" name="id_cita" hidden="" value="<?php echo $show[0] ?>">

                           <label for="nombre" class="form-label">Id de la cita</label>
                            <input type="text" class="form-control" name="id_cita" readonly required value="<?php echo $show[0]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Fecha de la cita</label>
                            <input type="text" class="form-control" name="fecha_cita" id="demoDate" required value="<?php echo $show[1]; ?>">
                            <div class="valid-feedback">Datos correctos</div>
                                        <div class="invalid-feedback">Complete los datos solicitados.</div>
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Hora de la cita</label>
                            <input type="time" class="form-control" name="hora_cita" required value="<?php echo $show[2]; ?>">
                            
                        </div>
                                    <div class="mb-3">
                                      <label for="exampleSelect1" >Nombre del Cliente</label>
                                      
                                      <select class="form-control" id="select" multiple="" name="cliente_id">
                                          <option selected value="<?php echo $show[3]; ?>"><?php echo $show[4]; ?></option>
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

                                    </div>

                                    <div class="mb-3">
                                      <label for="exampleSelect1" >Nombre del Empleado</label>
                                      
                                      <select class="form-control" id="select1" multiple="" name="empleado_id">
                                      <?php
                                      $empleado_id=$show[5];
                                        $obj = new methods();
                                        $sql2="SELECT id_usuario,nombre_usuario FROM usuario WHERE id_usuario=$empleado_id";
                                        $datos2=$obj->showInfo($sql2);                  
                                          foreach ($datos2 as $key2){ 
                                        ?>
                                          <option selected value="<?php echo $key2['id_usuario']; ?>"><?php echo $key2['nombre_usuario']; ?></option>
                                          <?php 
                                            }
                                          ?>

                                      <?php
                                        $obj = new methods();
                                        $sql3="SELECT id_usuario,nombre_usuario FROM usuario WHERE rol_id=2";
                                        $datos3=$obj->showInfo($sql3);                  
                                          foreach ($datos3 as $key3){ 
                                        ?>
                                          <option value="<?php echo $key3['id_usuario'] ?>"><?php echo $key3['nombre_usuario'] ?></option>
                                        <?php }?>
                                      </select>

                                    </div>

                                    
                       
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        
                        <a href="admin_reservations.php" style="text-decoration:none; color:white;"><div class="btn btn-primary float-right">Volver</div></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
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