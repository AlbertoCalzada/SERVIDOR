<?php

require '../bbdd/methods.php';

$indice = isset($_GET['indice']);

if ($indice !== null) {
    $cookieName = "carrito$indice";
    if (isset($_COOKIE["$cookieName"])) {
        $cookie = $_COOKIE["$cookieName"];


        $coches = getAllCars($db);
        echo "<h2>Carrito</h2>";
        foreach ($coches as $coche) {
            if ($coche->name == $cookie) {

                echo '<h3>Nombre del coche: </h3> ' . $coche->name;
                echo '<h3>Precio del coche: </h3>' . $coche->price;
                echo '<h3>Color del coche: </h3>' . $coche->color;
            }
        }
        echo "<br>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>

<body>
    <a href="./tienda.php">Tienda</a>


</body>

</html>