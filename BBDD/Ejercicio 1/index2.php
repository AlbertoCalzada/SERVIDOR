<?php 

include("config.php");
include("exportar.php");



if (isset($_POST["exportar"])) {
    ExportarToCsv($conn);
}

if (isset($_POST["exportarAMySql"])) {
    ExportarToMySql($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar</title>
</head>

<body>
    <h3>Exportar</h3>
    <form method="post">
        <input type="submit" name="exportar" value="Exportar a CSV">
    </form>

    <form method="post">
        <input type="submit" name="exportarAMySql" value="Exportar a MYSQL">
    </form>
</body>

</html>
