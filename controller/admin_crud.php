<?php
class methods{
    //SELECT ESTADISTICAS
    public function showInfoStatsC($sql){
        $c = new connect();
        $conexion=$c->conexion();

        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    }
    //CRUD CLIENTES
    public function showInfo($sql){
        $c = new connect();
        $conexion=$c->conexion();

        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    }

    public function insertInfoUC($info){
        $c = new connect();
        $conexion = $c->conexion();

        $sql1 = "CALL insert_user($info[0],'$info[1]',3)";
        // $sql1 = "INSERT INTO usuarios(id_usuario,contrasena_user,id_rol) VALUES ('$info[0]','$info[1]',3)";

        return $resutl1 = mysqli_query($conexion,$sql1);
    }
    public function insertInfoC($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql2 = "INSERT INTO clientes(documento_cliente,nombre_cliente,telefono_cliente) VALUES ('$info[0]','$info[2]','$info[3]')";
        return $result2 = mysqli_query($conexion,$sql2);
        }

    public function updateInfoC($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "UPDATE clientes SET nombre_cliente='$info[1]', telefono_cliente='$info[2]' WHERE id_cliente='$info[0]'";
        
        return $result=mysqli_query($conexion,$sql);
    }

    public function deleteInfoUC($documento_cliente){
        $c = new connect();
        $conexion = $c->conexion();
        $sql2 = "DELETE FROM usuarios WHERE id_usuario='$documento_cliente'";
        return $result2=mysqli_query($conexion,$sql2);
    }

    public function deleteInfoC($documento_cliente){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "DELETE FROM clientes WHERE documento_cliente='$documento_cliente'";
        return $result=mysqli_query($conexion,$sql);
    }

    //CRUD EMPLEADOS

    public function insertInfoUE($info){
        $c = new connect();
        $conexion = $c->conexion();
    
        $sql1 = "INSERT INTO usuarios(id_usuario,contrasena_user,id_rol) VALUES ('$info[0]','$info[1]',2)";

        return $resutl1 = mysqli_query($conexion,$sql1);
    }
    public function insertInfoE($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql2 = "INSERT INTO empleados(documento_empleado,nombre_empleado,telefono_empleado) VALUES ('$info[0]','$info[2]','$info[3]')";
        return $result2 = mysqli_query($conexion,$sql2);
        }
    
    
    public function updateInfoE($info){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "UPDATE empleados SET nombre_empleado='$info[1]', telefono_empleado='$info[2]' WHERE id_empleado='$info[0]'";
        
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoE($documento_empleado){
        $c = new connect();
        $conexion = $c->conexion();
        $sql = "DELETE FROM empleados WHERE documento_empleado='$documento_empleado'";
        return $result=mysqli_query($conexion,$sql);
    }
    public function deleteInfoUE($documento_empleado){
        $c = new connect();
        $conexion = $c->conexion();
        $sql2 = "DELETE FROM usuarios WHERE id_usuario='$documento_empleado'";
        return $result2=mysqli_query($conexion,$sql2);
    }

    
}
?>