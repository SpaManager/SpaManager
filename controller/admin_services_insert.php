<?php

require_once "../model/conexion.php";
require_once "../controller/admin_crud.php";
$nombre_servicio=$_POST['nombre_servicio'];
$descripcion_servicio=$_POST['descripcion_servicio'];
$imagen_servicio=addslashes(file_get_contents($_FILES['imagen_servicio']['tmp_name']));
$precio_servicio=$_POST['precio_servicio'];
$duracion_servicio=$_POST['duracion_servicio'];
$categoria_id=$_POST['categoria_id'];

$info=array($nombre_servicio,
            $descripcion_servicio,
            $imagen_servicio,
            $precio_servicio,
            $duracion_servicio,
            $categoria_id
            );
$obj = new methods();
if($obj->insertInfoS($info)==1){
    header("location:../view/admin_services.php");
    ?>
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        ¡Registro realizado exisotsamente!
        <a class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"><i title="Cerrar" class="fas fa-times"></i></a>
      </div> -->
      <?php
}else{
    echo "Hubo un error al añadir";
}

?>