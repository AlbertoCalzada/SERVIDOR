<?php

use MongoDB\Operation\InsertOne;

require_once __DIR__ . '/vendor/autoload.php';

$cliente = new MongoDB\Client("mongodb://localhost:27017"); //hacer la conexion a mongo

echo "Conexion exitosa <br>";

$coleccion = $cliente->local->amigos; //a la base de datos y luego a la coleccion


//metemos lo que queramos insertar
$datoAinsertar = [
    "nombre" => "David",
    "edad" => 33
];

// Verificar si ya existe un usuario con el mismo nombre
$existeUsuario = $coleccion->findOne(["nombre" => $datoAinsertar["nombre"]]);

if (!$existeUsuario) {
    // Si no existe, realizar la inserción
    $coleccion->insertOne($datoAinsertar);
    echo "Usuario insertado correctamente <br>";
} else {
    // Si ya existe, mostrar un mensaje
    echo "El usuario ya existe, no se insertó de nuevo <br>";
}


// Obtener todos los documentos de la colección. Como un select

$resultado = $coleccion->find();


foreach ($resultado as $documento) {

    $nombre = $documento['nombre'];
    $edad = $documento['edad'];



    echo "Nombre: $nombre, Edad: $edad <br>";
}
