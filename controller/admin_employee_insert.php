<?php

require_once "conexion.php";
require_once "admin_crud.php";

$id_usuario = $_POST['id_usuario'];
$contraseña = "ABC123";
$nombre_empleado=$_POST['nombre_empleado'];
$telefono_empleado=$_POST['telefono_empleado'];

$info=array($id_usuario,
            $contraseña,
            $nombre_empleado,
            $telefono_empleado            
            );
$obj = new methods();
if($obj->insertInfoUE($info)==1 && $obj->insertInfoE($info)==1){
    header("location:admin_employee.php");
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
