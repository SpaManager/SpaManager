<?php

require_once "../model/conexion.php";
require_once "../controller/admin_crud.php";

$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$cliente_id=$_POST['cliente_id'];
$empleado_id=$_POST['empleado_id'];


$info=array($fecha_cita,
            $hora_cita,
            $cliente_id,
            $empleado_id         
            );
$obj = new methods();
if($obj->insertInfoR($info)==1){
    header("location:../view/admin_reservations.php");
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