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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .enlace{
            margin:20px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-3">Insertar Valores</h3>
        <form action="./index.php" method="post">
            <div class="mb-3">
                <label for="idnombre" class="form-label">Nombre</label>
                <input type="text" name="idnombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="idapellido" class="form-label">Apellido</label>
                <input type="text" name="idapellido" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>

    <div class="container mt-3">
        <form action="./index.php" method="post">
            <button type="submit" name="listarAlumnos" class="btn btn-secondary">Ver Alumnos</button>
        </form>
    </div>
    <?php
    if (isset($_POST["listarAlumnos"])) {
        // Mostrar la lista de alumnos
        $resultado=ListarAlumnos($conn);
        if (strpos($resultado, "error") !== false) {
            echo '<p class="text-danger">' . "No tienes ningun dato para mostrar." . '</p>';
        } 
    }
    ?>

    <div class="container mt-5">
        <h3 class="mb-3">Buscar Alumno</h3>
        <form action="./index.php" method="post">
            <div class="mb-3">
                <label for="buscarAlumno" class="form-label">Nombre</label>
                <input type="text" name="buscarAlumno" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <?php
    if (isset($_POST["buscarAlumno"])) {
        $firstname = $_POST["buscarAlumno"];
        // Mostrar la lista de alumnos
        
        $resultado= BuscarAlumno($conn, $firstname);
        if (strpos($resultado, "error") !== false) {
            echo '<p class="text-danger">' . "No tienes ningun dato para mostrar." . '</p>';
        } 
    }
    ?>

    <div class="container mt-3 enlace">
        <a href="../Ejercicio2/index.php" class="btn btn-link">Ir a exportar</a>
    </div>
</body>

</html>
