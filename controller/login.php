<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo_ico.png">
    <link rel="stylesheet" href="../css/login_style.css">
    <script src="https://kit.fontawesome.com/a7ea85f115.js" crossorigin="anonymous"></script>
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="login1.php" method="post">
    <div class="box">
        <h1>Iniciar Sesión</h1>
        <div class="text">
            <i class="fas fa-user"></i>
            <input type='text' placeholder='Ingrese su cédula' name='id_usuario'>
        </div>
        <div class="text">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Ingrese su contraseña" name="contrasena_user" required="">
            
        </div>
        <div class="text2">
            <a href="#">¿Olvidaste tu contraseña?</a>
            <a href="../html/register.html">Crear nueva cuenta</a>
        </div>
        <button class="button" type="submit" name="iniciar" value="Iniciar">Iniciar
</button>
    </form>
</body>
</html>