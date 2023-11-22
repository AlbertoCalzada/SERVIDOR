
<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <h3>Bienvenido, Administrador</h3>
   
<form action="insertarProducto.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="precio">Precio:</label>
    <input type="number" name="precio"  required>
    <label for="imagen">Imagen :</label>
    <input type="text" name="imagen" required>
    <input type="submit" value="Insertar Producto">
</form>

</body>

</html>
