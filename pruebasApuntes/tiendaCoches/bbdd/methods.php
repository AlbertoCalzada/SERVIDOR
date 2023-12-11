<?php

require 'connection.php';
require '../archivos/classCoche.php';
require '../archivos/classUsuario.php';

//Funciones coches

function insertCar($db, $name, $price, $color)
{
    $conexion = $db->coches;
    $coche = new Coche($name, $price, $color);
    $conexion->insertOne($coche);
}

function getAllCars($db)
{
    
    //$coches = array();
    $conexion = $db->coches->find();

    foreach ($conexion as $coche)
        $coches[] = $coche;
    return $coches;
}

function deleteCar($db, $name)
{
    $conexion = $db->coches;

    $conexion->deleteOne(['name' => $name]);
    
    
    
}

function updateCar($db, $name, $price, $color)
{
    $conexion = $db->coches;

    $conexion->updateOne(
        ['name' => $name],
        ['$set' => ['price' => $price, 'color' => $color]]
    );
}

function buscarCoche($db, $nombre)
{
    $resultado = $db->coches->findOne(["name" => $nombre]);


   // Verificar si se encontró un coche
   if ($resultado) {
    // coche encontrado
    return true;
} else {
    // coche no encontrado
    return false;
}
}

function getCsvCars($db)
{
    try {
        $coches = getAllCars($db);
        $filename = "misCoches.csv";
        $file = fopen($filename, "w") or die("No se ha podido crear el archivo csv!");

       

        // Escribe los datos limpiando los valores para no tener espacios innecesarios
        foreach ($coches as $coche) {
            // Convierte el objeto BSONDocument a un array asociativo
            $cocheArray = iterator_to_array($coche);

            foreach ($cocheArray as &$value) {
                $value = trim($value);
            }
            fputcsv($file, $cocheArray);
        }

        fclose($file);
        return "Éxito en la operación";
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}



//Funciones usuarios

function insertUsuario($db, $name, $password)
{
    $conexion = $db->usuarios;
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $usuario = new Usuario($name, $pass,0);
    $conexion->insertOne($usuario);
}

/*function getAllUsuarios($db)
{
    $conexion = $db->usuarios->find();

    foreach ($conexion as $usuario)
        $usuarios[] = $usuario;
    return $usuarios;
}*/

function getAllUsuarios($db)
{
    $conexion = $db->usuarios->find();
    $usuarios = [];

    foreach ($conexion as $usuarioData) {
        // Crear un objeto Usuario y asignar los datos
        $usuario = new Usuario($usuarioData['name'], $usuarioData['pass'],$usuarioData['rol']);
        
        $usuarios[] = $usuario;
    }

    return $usuarios;
}

function buscarUsuario($db, $nombre)
{
    $resultado = $db->usuarios->findOne(["name" => $nombre]);


   // Verificar si se encontró un usuario
   if ($resultado) {
    // Usuario encontrado
    return true;
} else {
    // Usuario no encontrado
    return false;
}
}



function checkUsuario($db, $nombre,$pass)
{
    
    
    if (buscarUsuario($db, $nombre)) {
        // Obtener la información del usuario
        $usuario = $db->usuarios->findOne(["name" => $nombre]);

        // Verificar la contraseña (asumiendo que la contraseña está hasheada)
        if (password_verify($pass, $usuario['pass'])) {
            // Contraseña válida
            return true;
        }
    }

    // Usuario no encontrado o contraseña incorrecta
    return false;
}
