<?php
    require_once "../model/conexion.php";
    require_once "../controller/admin_crud.php";
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_ico.png">
    <link rel="stylesheet" href="css/register_style.css">
    <script src="https://kit.fontawesome.com/a7ea85f115.js" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
    <form action="Cliente.php" method="post">
    <div class="box">
        <h1>Registro</h1>
        <div class="text">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nombre completo" name="name">
        </div>
        <div class="text">
            <i class="fas fa-id-card"></i>
            <input type="text" placeholder="Cedula" name="id">
            
        </div>
        <div class="text">
            <i class="fas fa-phone-alt"></i>
            <input type="tel" placeholder="Numero Telefonico" name="telephone">
        </div>
        <div class="text">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Contraseña" name="password">
        </div>
        <div class="text2">
            <a href="login.php">Ya tengo una cuenta</a>
        </div>
        <input class="button" type="button" name="register" value="Registrar">
        <a href="../index.html"><input class="button" type="button" value="Volver al inicio"></a>
    </div>
    </form>
    
</body>
</html>