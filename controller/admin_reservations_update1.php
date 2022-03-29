<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_cita=$_POST['id_cita'];
$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$cliente_id=$_POST['cliente_id'];
$empleado_id=$_POST['empleado_id'];

$info=array($id_cita,
            $fecha_cita,
            $hora_cita,
            $cliente_id,
            $empleado_id
            );

$obj = new methods();
if($obj->updateInfoR($info)==1){
    header("location:../view/admin_reservations.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
