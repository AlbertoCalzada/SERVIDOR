<?php
require './bbdd/config.php';
require './bbdd/methods.php';
require 'classProducto.php';

if (isset($_GET["producto"])) {
    $producto = $_GET["producto"];
    $productos = verProductos($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Productos</title>
</head>

<body>
    <?php

    for ($i = 0; $i < count($productos); $i++) {
        if ($producto == $productos[$i]->name) {
            $path_img = $productos[$i]->path_img;
            echo "<h3>$producto</h3>";
            echo "<hr>";
            echo "<p><b>Precio:</b> " . $productos[$i]->price . "</p>";
            echo "<img src=$path_img alt=product-image>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>