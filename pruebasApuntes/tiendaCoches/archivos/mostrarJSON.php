<?php


require '../bbdd/methods.php';

$coches=getAllCars($db);

$obj_json = json_encode($coches);
echo $obj_json;

?>


