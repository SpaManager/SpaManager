<?php 

$documento_empleado=$_GET['documento_empleado'];
require_once "conexion.php";
require_once "admin_crud.php";

$obj = new methods();
if($obj->deleteInfoE($documento_empleado)==1 && $obj->deleteInfoUE($documento_empleado)==1){
    header("location:admin_employee.php");
}else{
    echo "Hubo un error al Eliminar";
}
?>