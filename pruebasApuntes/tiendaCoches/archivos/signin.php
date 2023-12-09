<?php
session_start(); //inicio de sesion
require '../bbdd/methods.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>

<body>
    <h3>Inicio de Sesion</h3>
    <form action="./signin.php" method="post">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Iniciar Sesión">
    </form><br>
    <a href="./signup.php">Registrarse</a>
    <?php
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (checkUsuario($db, $user, $pass)) {
            //si el usuario existe
            $_SESSION['user'] = $user;
            header('Location: ./postInicioSesion.php');
        } else {
            //si el usuario no existe
            echo "Usuario o contraseña incorrectos";
        }
    }

    ?>
</body>

</html>