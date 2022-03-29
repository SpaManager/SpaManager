<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_usuario=$_POST['id_usuario'];
$nombre_usuario=$_POST['nombre_usuario'];
$telefono_usuario=$_POST['telefono_usuario'];

$info=array($id_usuario,
            $nombre_usuario,
            $telefono_usuario
            );

$obj = new methods();
if($obj->updateInfoE($info)==1){
    header("location:../view/admin_employee.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
