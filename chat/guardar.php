





<?php
 session_start();
/*$myfile = fopen("credenciales.csv", "a") or die("Unable to open file!");
$usuario=$_POST["usuario"];
$password=$_POST["password"];

header('location: inicioSesion.php');*/
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$userFree = true; // Suponemos que el usuario está libre inicialmente

// Abre el archivo para lectura
$fp = fopen("credenciales.csv", "r");
if ($fp) {
    while (($data = fgets($fp)) !== false) {
        $arrayFrase = explode(",", $data);
        if (count($arrayFrase) == 2) {
            $existingUser = trim($arrayFrase[0]);
            if ($usuario == $existingUser) {
                $userFree = false; // El usuario ya existe
                break;
            }
        }
    }
    fclose($fp);
} else {
    die("No se ha podido abrir el archivo!");
}

if ($userFree) {
    $myfile = fopen("credenciales.csv", "a");
    if ($myfile) {
        fwrite($myfile, "$usuario,$password \n");
        fclose($myfile);
    } else {
        die("No se ha podido abrir el archivo!");
    }
}


if ($userFree){
    $_SESSION['messageGuardar'] = "Te has registrado correctamente.";
    header('Location: inicioSesion.php');
}else{
    $_SESSION['messageGuardar'] = "Este usuario ya esta en uso, por favor elige otro.";
    header('Location: registro.php');
}
?>