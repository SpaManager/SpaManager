<?php 

$id_categoria=$_GET['id_categoria'];
require_once "../model/conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoCS($id_categoria)==1){
    header("location:../view/admin_category.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>