<?php 

$id_usuario=$_GET['id_usuario'];
require_once "../model/conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoC($id_usuario)==1){
    header("location:../view/admin_customer.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>