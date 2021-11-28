<?php 

$documento_cliente=$_GET['documento_cliente'];
require_once "conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoC($documento_cliente)==1 && $obj->deleteInfoUC($documento_cliente)==1){
    header("location:admin_customer.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>