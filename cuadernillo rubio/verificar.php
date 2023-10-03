<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros random</title>

</head>

<body>

    <?php

    $numeroRandom1 = $_POST["numero1"];
    $numeroRandom2 = $_POST["numero2"];
    $resultado = $_POST["resultado"];
    $operandsymbol = $_POST["operacion"];

    switch ($operandsymbol) {
        case "+":
            $resultadoCorrecto = $numeroRandom1 + $numeroRandom2;
            if ($resultado == $resultadoCorrecto) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;

        case "-":
            $resultadoCorrecto = $numeroRandom1 - $numeroRandom2;
            if ($resultado == $resultadoCorrecto) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;

        case "*":
            $resultadoCorrecto = $numeroRandom1 * $numeroRandom2;
            if ($resultado == $resultadoCorrecto) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;
    }
    ?>
    <?php
    if ($resultado == $resultadoCorrecto) {
        echo '<form action="inicio.php" method="post">';
        echo '<input type="submit" value="Volver">';
        echo '<input type="number" name="resultadofinal" hidden>';
        echo '</form>';
    } else {
        echo '<button onclick="history.go(-1)">Volver</button>';
    }
    ?>
</body>

</html>