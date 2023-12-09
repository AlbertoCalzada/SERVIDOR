<?php
session_start();
require '../bbdd/methods.php';

if (isset($_POST["coche"])) {
    $nombre = $_POST["coche"];
    $precio = $_POST["precio"];
    $color = $_POST["color"];

    insertCar($db, $nombre, $precio, $color);
}

if (isset($_POST["selectCoches"])) {
    $coches = getAllCars($db);

    foreach ($coches as $coche) {
        echo " <h3>Coche</h3>";
        echo "<p>" . $coche['name'] . "</p>";
        echo "<p>" . $coche['price'] . "</p>";
        echo "<p>" . $coche['color'] . "</p>";
    }
}

if (isset($_POST["cocheAct"])) {
    $nombre = $_POST["cocheAct"];
    $precio = $_POST["precioAct"];
    $color = $_POST["colorAct"];

    updateCar($db, $nombre, $precio, $color);
}

if (isset($_POST["cocheBorrado"])) {
    $nombre = $_POST["cocheBorrado"];

    deleteCar($db, $nombre);
}

if (isset($_POST["csv"])) {
    getCsvCars($db);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del administrador</title>
</head>

<body>
    <h2>Insertar Coche</h2>
    <form action="./administrador.php" method="post">
        <label for="coche">Coche</label>
        <input type="text" name="coche" id="coche" required>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" required>
        <input type="submit" value="Insertar">
    </form>
    <hr>
    <h2>Actualizar Coche</h2>
    <form action="./administrador.php" method="post">
        <label for="coche">Coche</label>
        <input type="text" name="cocheAct" id="coche" required>
        <label for="precio">Precio</label>
        <input type="number" name="precioAct" id="precio" required>
        <label for="color">Color</label>
        <input type="text" name="colorAct" id="color" required>
        <input type="submit" value="Actualizar">
    </form>
    <hr>
    <form action="./administrador.php" method="post">
        <input type="submit" name="selectCoches" value="Ver Coches">
    </form>
    <hr>

    <hr>
    <h2>Borrar Coche</h2>
    <form action="./administrador.php" method="post">
        <label for="coche">Coche</label>
        <input type="text" name="cocheBorrado" id="coche" required>
        <label for="precio">Precio</label>
        <input type="number" name="precioBorrado" id="precio" required>
        <label for="color">Color</label>
        <input type="text" name="colorBorrado" id="color" required>
        <input type="submit" value="Borrar Coche">
    </form>
    <hr>
    <h2>Sacar CSV</h2>
    <form action="./administrador.php" method="post">
    <input type="submit" name="csv" value="Obtener CSV">
    </form>
</body>

</html>