<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_usuario = $_POST['id_usuario'];
$contrasena_usuario = "ABC123";
$nombre_usuario=$_POST['nombre_usuario'];
$correo_usuario=$_POST['correo_usuario'];
$telefono_usuario=$_POST['telefono_usuario'];
$rol_id=$_POST['rol_id'];

$info=array($id_usuario,
            $contrasena_usuario,
            $nombre_usuario,
            $correo_usuario,
            $telefono_usuario,
            $rol_id           
            );
$obj = new methods();
if($obj->insertInfoC($info)==1){
    header("location:../view/admin_customer.php");
    ?>
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Registro realizado exisotsamente!
        <a class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"><i title="Cerrar" class="fas fa-times"></i></a>
      </div> -->
      <?php
}else{
    echo "Hubo un error al añadir";
}
?>
