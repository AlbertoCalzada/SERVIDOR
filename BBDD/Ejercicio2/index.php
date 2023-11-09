<?php

include("../Ejercicio1/config.php");
include("../Ejercicio1/metodos.php");



if (isset($_POST["exportarCsv"])) {
    $resultado = ExportarToCsv($conn);
    if (strpos($resultado, "error") !== false) {
        echo '<p class="text-danger">' . $resultado . '</p>';
    } else {
        echo '<p class="text-success">' . $resultado . '</p>';
    }
}

if (isset($_POST["exportarMySql"])) {
    $resultado = ExportarToMySql($conn);
    if (strpos($resultado, "error") !== false) {
        echo '<p class="text-danger">' . $resultado . '</p>';
    } else {
        echo '<p class="text-success">' . $resultado . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</head>

<body>
    <div class="container mt-5">
        <h3>Exportar</h3>
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="post">
                    <button type="submit" name="exportarCsv" class="btn btn-primary">Exportar a CSV</button>
                </form>
                <br>
                <form method="post">
                    <button type="submit" name="exportarMySql" class="btn btn-primary">Exportar a MySQL</button>
                </form>
            </div>

        </div>

    </div>
    <div class="container mt-5 enlace">
        <a href="../Ejercicio1/index.php" class="btn btn-link">Volver a Insertar</a>
    </div>
</body>

</html>