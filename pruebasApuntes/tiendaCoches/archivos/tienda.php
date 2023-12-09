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
        if (isset($_POST["coche"])&& isset($_POST["detalles"])) {
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

        if (isset($_POST["coche"])&& isset($_POST["carrito"])) {
            $nombre = $_POST["coche"];
            
            setcookie($cookieName, $nombre, time() + 3600);

            for ($i = 0; $i < 5; $i++) { 
                $cookieName = "carrito$i";
            
                if (!isset($_COOKIE[$cookieName])) {
                 
                    echo "Cookie $cookieName establecida correctamente.";
            
                    // Redirigir a micarrito.php incluyendo el índice en la URL

                    header("Location: ./micarrito.php?indice=$i");
                    
                } else {
                    echo "La cookie $cookieName ya está definida.";
                }
            }
        }
        
        ?>
        <a href="./micarrito.php">Ver carrito</a>
    </div>
</body>

</html>