<?php
require_once "conexion.php";
$obj = new connect();
$conexion=$obj->conexion();
$id_cliente=$_GET['id_cliente'];
$sql="SELECT id_cliente,documento_cliente,nombre_cliente,telefono_cliente FROM clientes WHERE id_cliente='$id_cliente'";
$result=mysqli_query($conexion,$sql);
$show=mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/12fc8d1c07.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
                    <form class="p-4 needs-validation" method="post" action="admin_customer_update1.php" novalidate>
                    <div class="mb-3">
                        <input type="text" name="id_cliente" hidden="" value="<?php echo $show[0] ?>">

                            <label for="nombre" class="form-label">Documento Cliente</label>
                            <input type="text" class="form-control" name="documento_cliente"   readonly required value="<?php echo $show[1]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre_cliente" required value="<?php echo $show[2]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="cedula" name="telefono_cliente" required value="<?php echo $show[3]; ?>">
                            
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        
                        <a href="admin_customer.php" style="text-decoration:none; color:white;"><div class="btn btn-primary float-right">Volver</div></a>
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