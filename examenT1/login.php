
<?php
include("config.php");
include("metodos.php");
session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];

    function verifyCredentials($conn, $usuario, $contrasena)
{
    try {
        $sql = "SELECT contrasena FROM administrador WHERE usuario = '$usuario'";
        $stmt = $conn->query($sql);

        $hashedcontrasena = $stmt->fetchColumn();

        return ($hashedcontrasena !== false) && password_verify($contrasena, $hashedcontrasena);
    } catch (PDOException $e) {
        echo "Error al verificar credenciales: " . $e->getMessage();
        return false;
    }
}
    if (verifyCredentials($conn, $usuario, $contrasena)) {
        $_SESSION['usuario'] = $usuario;

        echo "Inicio de sesión exitoso.";
        header("Location: ./NuevoProducto.php");
        exit(); 
    } else {
        echo "<p style='color:red;'> Credenciales incorrectas.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>

<body>
    <h3>Iniciar Sesión</h3>
    <form action="./login.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>

</html>
