<?php

require_once "../model/conexion.php";
require_once "admin_crud.php";

$nombre_categoria=$_POST['nombre_categoria'];

$obj = new methods();
if($obj->insertInfoCS($nombre_categoria)==1){
    header("location:../view/admin_category.php");
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
