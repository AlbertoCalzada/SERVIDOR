<?php
 require './bbdd/config.php';
 require './bbdd/methods.php';

 if (isset($_POST["username"]) && isset($_POST["pass"])) {
    $name = $_POST["username"];
    $pass = $_POST["pass"];

    // Verificar las credenciales
    if (getAccess($conn, $name, $pass)) {
        // Las credenciales son válidas
        // Realiza las acciones que necesitas después de iniciar sesión
        echo "Inicio de sesión exitoso. Bienvenido, " . $name;
    } else {
        // Las credenciales no son válidas
        echo "Error: Nombre de usuario o contraseña incorrectos";
    }
}

if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["imagen"])) {
    // Obtener valores del formulario
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];

    // Llamar a la función para insertar el producto
    InsertarProducto($conn,$nombre, $precio, $imagen);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>

<body>
    <form action="./addProduct.php" method="post">
        <label for="id_nombre">Nombre</label>
        <input type="text" id="id_nombre" name="nombre">
        <label for="id_precio">Precio</label>
        <input type="number" id="id_precio" name="precio">
        <label for="id_imagen">Imagen(link)</label>
        <input type="text" id="id_imagen" name="imagen">
        <input type="submit" value="Guardar Producto">
    </form>
</body>

</html>