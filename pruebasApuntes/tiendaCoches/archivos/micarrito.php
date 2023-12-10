<?php

require '../bbdd/methods.php';

//$indice = isset($_GET['indice']); // header("Location: ./micarrito.php?indice=$i");


$cookieName = "carrito";
$counter = 0;


// Comprobar si existe la primera cookie del carrito
if (isset($_COOKIE["$cookieName$counter"])) {
    echo "<h2>Carrito</h2>";

    // Iterar a través de las cookies del carrito
    while (isset($_COOKIE["$cookieName$counter"])) {
        // Obtener el nombre del coche de la cookie
        $cookie = $_COOKIE["$cookieName$counter"];

        // Obtener todos los coches de la base de datos
        $coches = getAllCars($db);

        // Buscar el coche correspondiente en la base de datos
        foreach ($coches as $coche) {
            if ($coche->name == $cookie) {
                // Mostrar detalles del coche
                echo '<h3>Nombre del coche: </h3>' . $coche->name;
                echo '<h3>Precio del coche: </h3>' . $coche->price;
                echo '<h3>Color del coche: </h3>' . $coche->color;
                echo '<form action="./eliminarDelCarrito.php" method="post">';
                echo '<input type="hidden" name="cocheEliminar" value="' . $counter . '">';
                echo '<input type="submit" value="Eliminar del carrito">';
                echo '</form>';
                echo '<hr>';
                echo "<br>";
            }
        }

        // Moverse a la siguiente cookie del carrito
        $counter += 1;
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