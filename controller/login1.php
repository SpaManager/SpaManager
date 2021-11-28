<?php
$conexion=mysqli_connect("localhost","root","","nails_room")or die ("Problemas en la conexion");    
$id_usuario=$_POST['id_usuario'];
if(!is_numeric($id_usuario)){
    echo "<script>
    window.alert('El documento de identidad debe ser en numeros sin simbolos.');
    window.location.href='login.php';
    </script>"; 
}
$contrasena_user=$_POST['contrasena_user'];

$admin=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usuario=$id_usuario and contrasena_user='$contrasena_user' and id_rol=1");
// $result=mysqli_query($conexion,$admin);
// $show=mysqli_fetch_array($result);

// $customer=mysqli_query($conexion,"SELECT FROM usuarios WHERE id_usuario=$id_usuario and contrasena_user='$contrasena_user' and id_rol=3");
// $result=mysqli_query($conexion,$admin);
// $show=mysqli_fetch_array($result);

if(mysqli_num_rows($admin)>0){
    $show=mysqli_fetch_row($admin);
    session_start();
    $_SESSION['id_usuario'] = $id_usuario;
    header("location:admin.php");

}else{
    // header("location:login.php");
    echo "<script>
    window.alert('Los datos son incorrectos.');
    window.history.go(-1);
    </script>"; 
    
}

?>