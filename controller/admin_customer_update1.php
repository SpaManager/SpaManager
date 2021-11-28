<?php

require_once "conexion.php";
require_once "admin_crud.php";

$id_cliente=$_POST['id_cliente'];
$nombre_cliente=$_POST['nombre_cliente'];
$telefono_cliente=$_POST['telefono_cliente'];

$info=array($id_cliente,
            $nombre_cliente,
            $telefono_cliente            
            );

$obj = new methods();
if($obj->updateInfoC($info)==1){
    header("location:admin_customer.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
