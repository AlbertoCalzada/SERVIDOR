<?php
require './bbdd/config.php';
require './bbdd/methods.php';
require 'classProducto.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <style>
        button {
            text-decoration: none;
            border: none;
            background-color: white;
        }
    </style>
</head>

<body>
    <form action="./mostrarProducto.php" method="get">
        <label for="id_producto">Producto</label>

        <ul>
            <?php
            $productos = verProductos($conn);

            foreach ($productos as $producto) {
                echo "<li><button type='submit' value='" . $producto->name . "' name='producto'>" . $producto->name . "</button></li>";
            }
            ?>
        </ul>
    </form>
</body>

</html>