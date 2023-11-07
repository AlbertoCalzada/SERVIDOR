<?php

require './config.php';
require './metodos.php';

$firstname = "";
$secondname = "";

if (isset($_POST["idnombre"])) {
    $firstname = $_POST["idnombre"];
    $secondname = $_POST["idapellido"];
    Insert($conn, $firstname, $secondname);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h2>Insertar Alumno</h2>
        <form method="post" action="./index.php">
            <label for="idnombre">Nombre</label>
            <input type="text" name="idnombre" required>
            <label for="idapellido">Apellido</label>
            <input type="text" name="idapellido" required>
            <input type="submit" value="Insertar">

        </form>
    </div>
    <div>
        <h2>Buscar Alumno</h2>
        <form action="./index.php">
            <label for="idNombreBuscado">Nombre</label>
            <input type="text" name="idNombreBuscado" required>
            <input type="submit" value="Buscar">

        </form>
    </div>
</body>

</html>
<?php

$conn = null;

?>