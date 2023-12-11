<?php

require 'connection.php';
require __DIR__.'/../clases/users.php';
require __DIR__.'/../clases/menu.php';
require __DIR__.'/../clases/mesa.php';

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

function deleteUsuario($db, $name)
{
    $conexion = $db->usuarios;

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

/*function setBusy($db,$nombre,$busy)
{
    $conexion = $db->usuarios;

    $resultado = $conexion->findOne(["name" => $nombre]);

    $resultado->updateOne(
        
        ['$set' => ['busy' => $busy]]
    );
}*/

function setBusy($db, $nombre, $busy)
{
    $coleccion = $db->usuarios;

    $filtro = ['name' => $nombre];
    $operacion = ['$set' => ['busy' => $busy]];

    $coleccion->updateOne($filtro, $operacion);

    
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
    $usuario = new User($name, $pass, 0);
    $conexion->insertOne($usuario);
}

function insertarMenu($db,$name,$primero,$segundo,$postre)
{
    $conexion = $db->menus;
    $menu = new Menu($name, $primero, $segundo,$postre);
    $conexion->insertOne($menu);
}

function getMenus($db)
{
    $conexion = $db->menus->find();
    $menus = [];

    foreach ($conexion as $usuarioUnico) {
        // Crear un objeto Usuario y asignar los datos
       

        $menus[] = $usuarioUnico;
    }

    return $menus;
}
function insertPersonal($db, $name, $password,$rol)
{
    $conexion = $db->usuarios;
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $usuario = new User($name, $pass, $rol);
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

    foreach ($conexion as $usuarioUnico) {
        // Crear un objeto Usuario y asignar los datos
       

        $usuarios[] = $usuarioUnico;
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

function comprobarPersonal($db, $rol) //Esta funcion para contar el numero de personal que tenemos
{
    $usuarios = getAllUsuarios($db);
    $counter = 0;
    foreach ($usuarios as $usuario) {
        if ($usuario->rol == $rol) 
        {
            $counter++;
        }
    }
    return $counter;
}

function getPersonal( $db, $rol)
{
    $usuarios = getAllUsuarios($db);

    foreach ($usuarios as $usuario) {
        if ($usuario->rol == $rol) 
        {
         
            $personal[]= $usuario;
        }
    }
    return $personal;
   
}

function checkUsuario($db, $nombre, $pass)
{


    if (buscarUsuario($db, $nombre)) {
        

        $usuario = $db->usuarios->findOne(["name" => $nombre]);

        
        if (password_verify($pass, $usuario['pass'])) {
            // Contraseña válida
            return true;
        }
    }

    // Usuario no encontrado o contraseña incorrecta
    return false;
}
