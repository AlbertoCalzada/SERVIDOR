<?php
require './config.php';
require './method.php';

session_start();
if (isset($_POST['usrLog']) && isset($_POST['pwdLog'])) {
    $usr = $_POST['usrLog'];
    $pwd = $_POST['pwdLog'];

    function verifyCredentials($conn, $usr, $pwd)
{
    try {
        $sql = "SELECT pwd FROM usuario WHERE usr = '$usr'";
        $stmt = $conn->query($sql);

        $hashedPwd = $stmt->fetchColumn();

        return ($hashedPwd !== false) && password_verify($pwd, $hashedPwd);
    } catch (PDOException $e) {
        echo "Error al verificar credenciales: " . $e->getMessage();
        return false;
    }
}
    if (verifyCredentials($conn, $usr, $pwd)) {
        $_SESSION['username'] = $usr;

        echo "Inicio de sesión exitoso.";
        header("Location: ./NuevoProducto.php");
        exit(); 
    } else {
        echo "<p style='color:red;'> Credenciales incorrectas.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <h3>INICIO DE SESION - ADMIN</h3>
    <form action="login.php" method="POST">
        <label for="usrLog">Usuario: </label>
        <input type="text" name="usrLog" id="usrLog" placeholder="usuario" required>
        <label for="pwdLog">Contraseña</label>
        <input type="password" name="pwdLog" id="pwdLog" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>