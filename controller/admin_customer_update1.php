<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$id_usuario=$_POST['id_usuario'];
$nombre_usuario=$_POST['nombre_usuario'];
$correo_usuario=$_POST['correo_usuario'];
$telefono_usuario=$_POST['telefono_usuario'];

$info=array($id_usuario,
            $nombre_usuario,
            $correo_usuario,
            $telefono_usuario           
            );

$obj = new methods();
if($obj->updateInfoC($info)==1){
    header("location:../view/admin_customer.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
