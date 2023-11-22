<?php
require './config.php';
require './method.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta producto</title>
</head>

<body>
    <h3>REGISTRA UN PRODUCTO</h3>
    <form action="NuevoProducto.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre producto" required>
        <label for="precio">Precio: </label>
        <input type="number" name="precio" id="precio" required>
        <label for="imagen">URL Imagen: </label>
        <input type="text" name="imagen" id="imagen" placeholder='Ej:"./img/TuImagen.jpg"' required>
        <input type="submit" value="Enviar">
    </form>
        <a href="./index.html"><button>Menu Principal</button></a>
    <?php
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];

        if (ExisteProducto($conn, $nombre)) {
            echo "¡El producto ya existe!";
        } else {
            InsertarProducto($conn, $nombre, $precio, $imagen);
        }
    } 

    function ExisteProducto($conn, $nombre)
    {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM Productos WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    ?>
</body>