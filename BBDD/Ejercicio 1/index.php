<?php

include("config.php");
include("metodos.php");

if (isset($_POST["idnombre"]) && isset($_POST["idapellido"])) {
    $nombre = $_POST["idnombre"];
    $apellido = $_POST["idapellido"];


    Insertar($conn, $nombre, $apellido);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <div>
        <h3>Insertar Valores</h3>
        <form action="./index.php" method="post">
            <label for="idnombre">Nombre</label>
            <input type="text" name="idnombre" required>
            <label for="idapellido">Apellido</label>
            <input type="text" name="idapellido" required>
            <input type="submit" value="Insertar">
        </form>
    </div>

    <div>
        <form action="./index.php" method="post">
            <input type="submit" name="listarAlumnos" value="Ver Alumnos">
        </form>
    </div>
    <?php
    if (isset($_POST["listarAlumnos"])) {
        // Mostrar la lista de alumnos
        ListarAlumnos($conn);
    }
    ?>

    <div>
        <h3>Buscar Alumno</h3>
        <form action="./index.php" method="post">
            <label for="buscarAlumno">Nombre</label>
            <input type="text" name="buscarAlumno">
            <input type="submit" value="Buscar">
        </form>
    </div>
</body>

</html>