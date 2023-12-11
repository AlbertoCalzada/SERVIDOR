<?php
session_start();

require './bbdd/methods.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>

<body>
    <form action="./reservas.php" method="post">
        <label for="dia">Dia de la reserva:</label>
        <input type="text" name="dia" required maxlength="2">
        <select name="hora" id="hora" required>Hora de la reserva:
            <option value="">13:00</option>
            <option value="">14:00</option>
            <option value="">15:00</option>
            <option value="">20:00</option>
            <option value="">21:00</option>
            <option value="">22:00</option>
        </select>
        <label for="personas">Numero de personas</label>
        <input type="number" name="personas" maxlength="2" required>
        <input type="submit" name="reservar" value="Reservar">
    </form>

    <?php

if (isset($_POST['reservar'])) {
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];

    $numeroDePersonal = comprobarPersonal($db, 1);
    $camareroEncontrado = false;
    
    if ($numeroDePersonal >= 1) {
        $personal = getPersonal($db, 1);

        var_dump($personal);

        foreach ($personal as $uno) {
            
            if ($uno->busy !=1) {
                setBusy($db, $uno->name, 1);
                $camareroEncontrado = true;
                
                break;
            }
        }

        if ($camareroEncontrado) {
            echo "Has hecho una reserva con exito <br>";
            echo "Te atenderá nuestro camarero: $uno->name";
        } else {
            echo "No hay camareros disponibles en este momento";
        }
    } else {
        echo "No hay personal disponible en estos momentos";
    }
}



    ?>
</body>

</html>