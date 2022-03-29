<?php
require_once "../model/conexion.php";
require_once "../controller/admin_crud.php";
$obj = new connect();
$conexion=$obj->conexion();
$id_servicio=$_GET['id_servicio'];
$sql="SELECT id_servicio,nombre_servicio,descripcion_servicio,precio_servicio,duracion_servicio,categoria_id,nombre_categoria FROM servicio INNER JOIN categoria ON servicio.categoria_id=categoria.id_categoria WHERE id_servicio='$id_servicio'";

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
                    <form class="p-4 needs-validation" method="post" action="../controller/admin_services_update1.php">
                    <div class="mb-3">
                        <input type="text" name="id_servicio" hidden="" value="<?php echo $show[0] ?>">

                            <label for="nombre" class="form-label">Id del servicio</label>
                            <input type="text" class="form-control" name="id_servicio" readonly required value="<?php echo $show[0]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del servicio</label>
                            <input type="text" class="form-control" name="nombre_servicio" required value="<?php echo $show[1]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Descripcion del servicio</label>
                            <input style="height:50px" type="text" class="form-control" name="descripcion_servicio" required value="<?php echo $show[2]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Precio del servicio</label>
                            <input type="text" class="form-control" name="precio_servicio" required value="<?php echo $show[3]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Duracion del servicio (Horas)</label>
                            <input type="text" class="form-control" name="duracion_servicio" required value="<?php echo $show[4]; ?>">
                            
                        </div>
                        <div class="form-group">
                    <label for="exampleSelect1">Categoria del servicio</label>
                    <select class="form-control" id="exampleSelect1" name="categoria_id">
                      <option value="<?php echo $show[5]; ?>"><?php echo $show[6]; ?></option>
                      <?php
                      $obj = new methods();
                      $sql1="SELECT id_categoria,nombre_categoria FROM categoria";
                      $datos=$obj->showInfo($sql1);                  
                          foreach ($datos as $key){ 
                      ?>

                      <option value="<?php echo $key['id_categoria'] ?>"><?php echo $key['nombre_categoria'] ?></option>
                      <?php 
                        }
                      ?>
                    </select>
                  </div>
                       
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        
                        <a href="admin_services.php" style="text-decoration:none; color:white;"><div class="btn btn-primary float-right">Volver</div></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
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