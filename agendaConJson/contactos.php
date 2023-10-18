<?php
$myfile = fopen("listacontactos.csv", "a") or die("No se ha podido ejecutar el archivo csv!");
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$telefono=$_POST["telefono"];
fwrite($myfile, "$nombre,$apellido,$telefono \n");
fclose($myfile);
header('Location: veragenda.php');

?>

