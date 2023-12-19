<?php
session_start();

require './bbdd/accesoBD.php';

$alumnos = getAlumnos($db);



if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $tablaElegida = $_SESSION['tabla'];
} else {
    header('Location: ./index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_CALZADA_TURNO_BABOR</title>
    <style>
        body {
            background-color: red;
        }
    </style>
</head>

<body>
    <?php
    foreach ($alumnos as $uno) {
        if ($uno->name == $usuario) {
            echo "Nota de la tabla del $tablaElegida : $uno->puntuacion[$tablaElegida]";
        }
    }

    ?>
</body>

</html>