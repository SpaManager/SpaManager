<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_servicio=$_POST['id_servicio'];
$imagen_servicio=addslashes(file_get_contents($_FILES['imagen_servicio']['tmp_name']));

$info=array($id_servicio,
            $imagen_servicio     
            );

$obj = new methods();
if($obj->updateInfoSI($info)==1){
    header("location:../view/admin_services.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
