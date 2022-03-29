<?php 

$id_servicio=$_GET['id_servicio'];
require_once "../model/conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoS($id_servicio)==1){
    header("location:../view/admin_services.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>