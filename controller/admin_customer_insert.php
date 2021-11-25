<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo_ico.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/12fc8d1c07.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Registro Cliente</title>
</head>
<body> -->

<?php

require_once "conexion.php";
require_once "admin_customer_crud.php";

$id_usuario = $_POST['id_usuario'];
$contraseña = "ABC123";
$nombre_cliente=$_POST['nombre_cliente'];
$telefono_cliente=$_POST['telefono_cliente'];

$info=array($id_usuario,
            $contraseña,
            $nombre_cliente,
            $telefono_cliente            
            );
$obj = new methods();
if($obj->insertInfo($info)==1 && $obj->insertInfoC($info)==1){
    header("location:admin_customer.php");
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Registro realizado exisotsamente!
        <a class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"><i title="Cerrar" class="fas fa-times"></i></a>
      </div>
      <?php
}else{
    echo "Hubo un error al añadir";
}
?>
<!--     
</body>
</html> -->