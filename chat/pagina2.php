<?php
// Para empezar la sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>

<body>
    <?php
    $_SESSION["usuario"] = $_POST["usuario"];
    $usuario = $_SESSION["usuario"];
    $_SESSION["password"] = $_POST["password"];
    $password =  $_SESSION["password"];
    $myfile = fopen("credenciales.csv", "a") or die("Unable to open file!");

    fwrite($myfile, "$usuario,$password \n");
    fclose($myfile);
    echo "Tu usuario es :  " . $_SESSION["usuario"] . ".<br>";
    ?>


</body>

</html>