<?php

require_once "conexion.php";
require_once "admin_crud.php";

$id_empleado=$_POST['id_empleado'];
$nombre_empleado=$_POST['nombre_empleado'];
$telefono_empleado=$_POST['telefono_empleado'];

$info=array($id_empleado,
            $nombre_empleado,
            $telefono_empleado            
            );

$obj = new methods();
if($obj->updateInfoE($info)==1){
    header("location:admin_employee.php");
}else{
    echo "Hubo un error al Actualizar";
}
?>
