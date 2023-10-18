<?php
$myfile = fopen("listacontactos.csv", "r") or die("No se ha podido leer el fichero!");

$data = array();

while (!feof($myfile)) {
  $frase = fgets($myfile);
  $arrayFrase = explode(",", $frase);

  if (count($arrayFrase) == 3){

  
  $nombre = trim($arrayFrase[0]);
  $apellido = trim($arrayFrase[1]);

  $data[$nombre] = $apellido;
}
}


$json = json_encode($data, JSON_PRETTY_PRINT);

echo $json;

fclose($myfile);

?>