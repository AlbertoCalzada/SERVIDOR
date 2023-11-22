<?php
include("config.php");
include("metodos.php");

if (isset($_POST["producto"])) {
    
    $productoSeleccionado = $_POST["producto"];

   
    setcookie("producto_seleccionado", $productoSeleccionado, time() + 3600);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>

<body>
    <?php
    
    if (isset($_COOKIE["producto_seleccionado"])) {
        $productoSeleccionado = $_COOKIE["producto_seleccionado"];

        BuscarProducto($conn,$productoSeleccionado);
    } else {
        echo "<p>No se ha seleccionado ningún producto.</p>";
    }
    ?>
</body>

</html>
