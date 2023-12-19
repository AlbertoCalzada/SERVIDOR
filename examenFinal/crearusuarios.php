<?php

require './bbdd/accesoBD.php';

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(buscarAlumno($db,$user))
    {
        echo "El  usuario ya existe";

    }else
    {
        insertUsuario($db,$user , $pass);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_CALZADA_TURNO_BABOR</title>
    <style>
        body{
            background-color: red;
        }
    </style>
</head>

<body>
    <h3>Registro</h3>
    <form action="./crearusuarios.php" method="post">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Registrarse">
    </form>
    <a href="./index.php">Iniciar Sesión</a>
</body>

</html>