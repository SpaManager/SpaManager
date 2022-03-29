<?php 

$id_cita=$_GET['id_cita'];
require_once "../model/conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoR($id_cita)==1){
    header("location:../view/admin_reservations.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>