<?php
    require './bbdd/config.php';
    require './bbdd/methods.php';
    require 'classProducto.php';

    echo json_encode(verProductos($conn));

    $conn=null;
?>