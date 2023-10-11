<?php 
session_start();


$usuario = $_SESSION["usuario"];
$fechaActual = $_POST["fecha"];
$mensaje = $_POST["mensaje"];


if (str_contains($mensaje, '<script>')) {
    $mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');
    $_SESSION['errorScript'] = "Vaya, algo ha fallado al introducir el comentario, inténtalo de nuevo.";
    header('location: chat.php');
}else{
    $myfile = fopen("comentarios.csv", "a") or die("Unable to open file!");
    $linea = "$usuario,$fechaActual,$mensaje \n";
    fwrite($myfile, $linea);
    fclose($myfile);
    header('location: chat.php');
}
