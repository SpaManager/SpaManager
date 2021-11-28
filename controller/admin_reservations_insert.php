<?php

require_once "conexion.php";
require_once "admin_crud.php";

$id_usuario = $_POST['id_usuario'];
$contrasena_user = "ABC123";
$nombre_cliente=$_POST['nombre_cliente'];
$telefono_cliente=$_POST['telefono_cliente'];

$info=array($id_usuario,
            $contrasena_user,
            $nombre_cliente,
            $telefono_cliente            
            );
$obj = new methods();
if($obj->insertInfoUC($info)==1 && $obj->insertInfoC($info)==1){
    header("location:admin_customer.php");
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