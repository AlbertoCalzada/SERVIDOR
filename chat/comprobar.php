<?php
session_start();
$myfile = fopen("credenciales.csv", "r") or die("Unable to open file!"); 

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$loginSuccess = false; 
$_SESSION["usuario"] = $usuario;
$_SESSION["password"] = $password;

while (!feof($myfile)) {
    $frase = fgets($myfile);
    $arrayFrase = explode(",", $frase);
    
    if(count($arrayFrase) >= 2){ 
        if ($usuario == ($arrayFrase[0]) && $password == ($arrayFrase[1])) { 
            $loginSuccess = true;
            break; 
        }
    }
}

fclose($myfile);

if ($loginSuccess) {
    
    header('Location: chat.php');
} else {
    
    $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
    header('Location: inicioSesion.php');
}
