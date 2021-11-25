<?php 

$documento_cliente=$_GET['documento_cliente'];
require_once "conexion.php";
require_once "admin_customer_crud.php";

$obj = new methods();
if($obj->deleteInfo($documento_cliente)==1 && $obj->deleteInfoU($documento_cliente)==1){
    header("location:admin_customer.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>