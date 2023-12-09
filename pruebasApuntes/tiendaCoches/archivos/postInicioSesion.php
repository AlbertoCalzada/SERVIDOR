<?php
session_start(); //inicio de sesion

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enlaces de interes</title>
</head>

<body>
    <header>
        <?php

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            echo "<ul>";
            if ($user == 'admin') {
                echo "<h1>Bienvenido administrador</h1>";
                echo "<li><a href='./administrador.php'>Administrar</a></li>";
                echo "<li><a href='./mostrarJSON.php'>Sacar JSON</a></li>";
            } else {
                echo "<h1>Bienvenido usuario</h1>";
            }
          
            echo "<li><a href='./tienda.php'>Tienda</a></li>";
            echo "<li><a href='./tienda.php'>Carrito</a></li>";
            echo "</ul>";
        }
        ?>

    </header>
    <div>
        <?php
     echo "<a href='./desconectarse.php'>Desconectarse</a>";
        ?>
    </div>
</body>

</html>