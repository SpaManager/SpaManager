<?php
class methods{
    //SELECT ESTADISTICAS
    public function showInfoStatsC($sql){
        $c = new connect();
        $conexion=$c->conexion();

        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    }
   //SELECT INFO
    public function showInfo($sql){
        $c = new connect();
        $conexion=$c->conexion();

        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    }
    //CRUD CLIENTES
    public function insertInfoC($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql1 = "CALL INSERTAR_CLIENTE($info[0],'$info[1]','$info[2]','$info[3]',$info[4],3)";
        // $sql1 = "INSERT INTO usuarios(id_usuario,contrasena_user,id_rol) VALUES ('$info[0]','$info[1]',3)";

        return $resutl1 = mysqli_query($conexion,$sql1);
    }    
    public function updateInfoC($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL EDITAR_CLIENTE($info[0],'$info[1]','$info[2]',$info[3])";
        // $sql = "UPDATE clientes SET nombre_cliente='$info[1]', telefono_cliente='$info[2]' WHERE id_cliente='$info[0]'";
        
        return $result=mysqli_query($conexion,$sql);
    }

    public function deleteInfoC($id_usuario){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL ELIMINAR_CLIENTE($id_usuario)";
        //$sql2 = "DELETE FROM usuarios WHERE id_usuario='$documento_cliente'";
        return $result2=mysqli_query($conexion,$sql);
    }


    //CRUD EMPLEADOS

    public function insertInfoE($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL INSERTAR_EMPLEADO($info[0],'$info[1]','$info[2]','$info[3]',2)";
        // $sql1 = "INSERT INTO usuarios(id_usuario,contrasena_user,id_rol) VALUES ('$info[0]','$info[1]',3)";

        return $resutl = mysqli_query($conexion,$sql);
    }    
    public function updateInfoE($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "UPDATE usuario SET nombre_usuario='$info[1]', telefono_usuario='$info[2]' WHERE id_usuario='$info[0]'";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoE($id_usuario){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "DELETE FROM usuario WHERE id_usuario='$id_usuario'";
        return $result=mysqli_query($conexion,$sql);
    }


    //CRUD CATEGORIAS

    public function insertInfoCS($nombre_categoria){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL INSERTAR_CATEGORIA('$nombre_categoria')";
        return $result = mysqli_query($conexion,$sql);
    }
    public function updateInfoCS($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL EDITAR_CATEGORIA($info[0],'$info[1]')";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoCS($id_categoria){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL ELIMINAR_CATEGORIA($id_categoria)";
        return $result=mysqli_query($conexion,$sql);
    }


    //CRUD SERVICIOS

    public function insertInfoS($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL INSERTAR_SERVICIO('$info[0]','$info[1]','$info[2]',$info[3],$info[4],$info[5])";
        return $result = mysqli_query($conexion,$sql);
    }
    public function updateInfoS($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL EDITAR_SERVICIO($info[0],'$info[1]','$info[2]','$info[3]','$info[4]',$info[5])";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function updateInfoSI($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL EDITAR_IMAGEN_SERVICIO($info[0],'$info[1]')";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoS($id_servicio){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL ELIMINAR_SERVICIO($id_servicio)";
        return $result=mysqli_query($conexion,$sql);
    }

    //CRUD RESERVACIONES
    public function insertInfoR($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL INSERTAR_CITA('$info[0]','$info[1]',$info[2],$info[3],'Reservado')";
        return $result = mysqli_query($conexion,$sql);
    }
    public function updateInfoR($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL EDITAR_CITA($info[0],'$info[1]','$info[2]',$info[3],$info[4])";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoR($id_cita){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "CALL ELIMINAR_CITA($id_cita)";
        return $result=mysqli_query($conexion,$sql);
    }

}
?>