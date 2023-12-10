<?php
session_start();
require '../bbdd/methods.php';



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

        }
    </style>
</head>

<body>
    <div>


        <h3>Compra de coches</h3>
        <form action="./tienda.php" method="post">
            <label for="coche">Selecciona un coche</label>
            <select name="coche" id="coche">
                <?php
                $coches = getAllCars($db);

                foreach ($coches as $coche) {
                    echo "<option>" . $coche->name . "</option>";
                }
                ?>
            </select>

            <input type="submit" value="Ver Detalles" name="detalles">
            <input type="submit" value="Agregar al carrito" name="carrito">
        </form>
        <hr>
        <?php
        if (isset($_POST["coche"]) && isset($_POST["detalles"])) {
            $nombre = $_POST["coche"];
            $coches = getAllCars($db);

            foreach ($coches as $coche) {
                if ($coche->name == $nombre) {

                    echo '<h3>Nombre del coche: </h3> ' . $coche->name;
                    echo '<h3>Precio del coche: </h3>' . $coche->price;
                    echo '<h3>Color del coche: </h3>' . $coche->color;
                }
            }
        }
        $counter = 0;
        // Comprobación y actualización del carrito al agregar un coche
        if (isset($_POST["coche"]) && isset($_POST["carrito"])) {
            $nombre = $_POST["coche"];

            // Encontrar la primera posición libre en las cookies del carrito
            while (isset($_COOKIE["carrito$counter"])) {
                $counter += 1;
            }

            // Establecer una nueva cookie del carrito
            setcookie("carrito$counter", $nombre);
        }

        // Reiniciar el contador
        $counter = 0;

        // Conteo de elementos en el carrito
        if (isset($_COOKIE["carrito0"])) {
            while (isset($_COOKIE["carrito$counter"])) {
                $counter += 1;
            }
        }
        ?>
        <a href="./micarrito.php">Ver carrito</a>
    </div>
</body>

</html>