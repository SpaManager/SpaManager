<?php 
require_once "../model/conexion.php";
require_once "admin_crud.php";
$id_usuario=$_GET['id_usuario'];

$obj = new methods();
if($obj->deleteInfoE($id_usuario)==1){
    header("location:../view/admin_employee.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>