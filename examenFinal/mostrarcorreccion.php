<?php
session_start();
require './bbdd/accesoBD.php';
$alumnos = getAlumnos($db);
if (isset($_POST['corregir'])) {
    $tablaElegidaServer = $_SESSION['tabla'];
    $usuario = $_SESSION['usuario'];
    $counter = 0;
    for ($i = 1; $i <= 10; $i++) {
        $nombreCampo = "resultado$i";
        if (isset($_POST[$nombreCampo])) {
            $resultado = $_POST[$nombreCampo];
            $tablaElegidaServerNumero = floatval($tablaElegidaServer);
            $resultadoNumero = floatval($resultado);
            $resultadoCorrecto = $tablaElegidaServerNumero * $i;
            echo "Multiplicando $tablaElegidaServer por $i debería dar $resultadoCorrecto<br>";
            echo "Resultado correcto: $resultadoCorrecto<br>";
            echo "Resultado ingresado: $resultadoNumero<br>";
            if ($resultadoNumero == $resultadoCorrecto) {
                echo "<div class='correcto'>$tablaElegidaServer x $i=$resultado</div>";
                $counter++;
            } else {
                echo "<div class='incorrecto'>$tablaElegidaServer x $i=$resultado</div>";
            }
        } else {
            echo "<div class='incorrecto'>El campo $nombreCampo no está presente en el formulario.</div>";
        }
    }
    echo "Nota final: $counter";
    foreach ($alumnos as $uno) {
        if ($uno->name == $usuario) {
            if ($uno->puntuacion < $counter) {
                asignarPuntuacion($db, $usuario, $tablaElegidaServer, $counter);
            }
        }
    }
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
        .correcto {
            color: green;
        }
        .incorrecto {
            color: crimson;
        }
        body {
            background-color: red;
        }
    </style>
</head>
<body>
    <a href="./verpuntuaciones.php">Ver puntuaciones</a>
</body>
</html>