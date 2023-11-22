<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <?php
    include("config.php"); 
    include("method.php"); 
    ?>
</head>
<body>
<form method="post" action="ListaProductos.php">
        <label for="producto">Selecciona un producto:</label>
        <select name="producto" id="producto">
            <option value="CocaCola">CocaCola</option>
            <option value="Fanta">Fanta</option>
            <option value="Sprite">Sprite</option>
            <option value="Agua">Agua</option>
        </select>
        <input type="submit" value="VER">
    </form>
    <?php
    if (isset($_POST["producto"])) {
        $producto = $_POST["producto"];
        BuscarProducto($conn, $producto);
    }
    ?>
</body>
</html>