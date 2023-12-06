<?php

/*use MongoDB\Operation\InsertOne;

require_once __DIR__ . '/../vendor/autoload.php';



$cliente = new MongoDB\Client("mongodb://localhost:27017"); //hacer la conexion a mongo*/

include 'accesomongo.php';

/*$coleccion = $cliente->local->amigos; //a la base de datos y luego a la coleccion*/




// Verificar si ya existe un usuario con el mismo nombre
/*$existeUsuario = $coleccion->findOne(["nombre" => $datoAinsertar["nombre"]]);

if (!$existeUsuario) {
    // Si no existe, realizar la inserción
    $coleccion->insertOne($datoAinsertar);
    echo "Usuario insertado correctamente <br>";
} else {
    // Si ya existe, mostrar un mensaje
    echo "El usuario ya existe, no se insertó de nuevo <br>";
}*/
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $tlf = $_POST["tlf"];

    Insertar($nombre, $tlf, $acceso);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <h2>Insertar</h2>
    <form action="index.php" method="POST">
        <label for="idNombre">Nombre</label>
        <input type="text" id="idNombre" name="nombre" required>
        <label for="idtlf">Telefono</label>
        <input type="tel" name="tlf" id="idtlf" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
        <input type="submit" value="Insertar">
    </form>
    <hr>
    <br>
    <form action="index.php" method="post">
        <input type="submit" name="visualizar" value="Visualizar">
    </form>
    <br>
    <?php
    if (isset($_POST["visualizar"])) {
        $contactos = Visualizar($acceso);


        for ($i = 0; $i < count($contactos); $i++) {
            echo " Nombre : " . $contactos[$i]->nombre . " , Telefono: " . $contactos[$i]->telefono . "<br>";
        }
    }
    ?>
    <hr>
    <br>
    <h2>Buscar</h2>
    <form action="index.php" method="post">
        <label for="idNombre">Nombre</label>
        <input type="text" id="idNombre" name="nombreBuscado" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <br>
    <?php
    if (isset($_POST["nombreBuscado"])) {
        $nombre = $_POST["nombreBuscado"];
        $resultado=Buscar($nombre, $acceso);

        if ($resultado!=null)
        {
            for ($i = 0; $i < count($resultado); $i++) {
                echo " Nombre : " . $resultado[$i]->nombre . " , Telefono: " . $resultado[$i]->telefono . "<br>";
            }
        }else{
            echo "Ese contacto no se encuentra en tu agenda.";
        }
       
    }
    ?>
</body>

</html>