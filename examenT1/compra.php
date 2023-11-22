<?php
include("config.php");
include("metodos.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <form action="compra.php" method="POST">
        <h3>Productos</h3>
        <label for="idproducto">Selecciona el producto</label>
        <select name="producto" id="idproducto">
            <?php
            VerProducto($conn);
            ?>
        </select>
        <input type="submit" value="Ver Detalles">
    </form>
    <?php
    if (isset($_POST["producto"])) {
        $producto = $_POST["producto"];
        $cookie_value = $_POST["producto"];
        setcookie("ropa",$cookie_value,time()+3600);
        BuscarProducto($conn, $producto);
    }
    ?>
</body>

</html>
