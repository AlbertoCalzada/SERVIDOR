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
            if ($resultado == ($numeroRandom1 + $numeroRandom2)) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;

        case "-":
            if ($resultado == ($numeroRandom1 - $numeroRandom2)) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;

        case "*":
            if ($resultado == ($numeroRandom1 * $numeroRandom2)) {
                echo "El resultado es correcto ";
            } else {
                echo " El resultado no es correcto ";
            }

            break;
    }
    ?>
    <form action="inicio.php" method="post">
        <input type="submit" value="Volver" onclick="location.href='inicio.php'">
        <input type="number" name="resultadofinal" hidden>
    </form>

</body>

</html>