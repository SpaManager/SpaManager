<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_categoria=$_POST['id_categoria'];
$nombre_categoria=$_POST['nombre_categoria'];

$info=array($id_categoria,
            $nombre_categoria          
            );

$obj = new methods();
if($obj->updateInfoCS($info)==1){
    header("location:../view/admin_category.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
