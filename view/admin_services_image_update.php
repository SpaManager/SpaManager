<?php
require_once "../model/conexion.php";
require_once "../controller/admin_crud.php";
$obj = new connect();
$conexion=$obj->conexion();
$id_servicio=$_GET['id_servicio'];
$sql="SELECT id_servicio,imagen_servicio FROM servicio WHERE id_servicio='$id_servicio'";

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
                    <form class="p-4 needs-validation" method="post" action="../controller/admin_services_image_update1.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" name="id_servicio" hidden="" value="<?php echo $show[0] ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Imagen del servicio</label>
                            <center><img width="90%" src="data:image/jpg;base64,<?php echo base64_encode($show[1]) ?>"></center>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Subir imagen</label>
                            <input type="file" accept="image/*" name="imagen_servicio" required>
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