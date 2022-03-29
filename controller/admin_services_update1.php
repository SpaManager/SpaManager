<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_servicio=$_POST['id_servicio'];
$nombre_servicio=$_POST['nombre_servicio'];
$descripcion_servicio=$_POST['descripcion_servicio'];
$precio_servicio=$_POST['precio_servicio'];
$duracion_servicio=$_POST['duracion_servicio'];
$categoria_id=$_POST['categoria_id'];

$info=array($id_servicio,
            $nombre_servicio,
            $descripcion_servicio,
            $precio_servicio,
            $duracion_servicio,
            $categoria_id       
            );

$obj = new methods();
if($obj->updateInfoS($info)==1){
    header("location:../view/admin_services.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
