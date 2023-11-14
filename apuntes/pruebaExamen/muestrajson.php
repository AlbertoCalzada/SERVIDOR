
<?php
include 'funciones.php';

$listaCompraJSON = getListaCompraJSON();

header('Content-Type: application/json');
echo $listaCompraJSON;

?>