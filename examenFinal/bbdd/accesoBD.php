<?php

require 'connection.php';
require __DIR__.'/../clases/student.php';






//Funciones usuarios

function insertUsuario($db, $name, $password)
{
    $conexion = $db->alumno;
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $usuario = new Student($name, $pass, 0);
    $conexion->insertOne($usuario);
}

function insertarMenu($db,$name,$primero,$segundo,$postre)
{
    $conexion = $db->menus;
    $menu = new Menu($name, $primero, $segundo,$postre);
    $conexion->insertOne($menu);
}

function getAlumnos($db)
{
    $conexion = $db->alumno->find();
    $alumnos = [];

    foreach ($conexion as $usuarioUnico) {
        // Crear un objeto Usuario y asignar los datos
       

        $alumnos[] = $usuarioUnico;
    }

    return $alumnos;
}
function asignarPuntuacion($db,$alumno,$tabla,$nota)
{
    $coleccion = $db->alumno;

    $filtro = ['name' => $alumno];
    $operacion = ['$set' => ['puntuacion' => $nota]];

    $coleccion->updateOne($filtro, $operacion);


}

function setBusy($db, $nombre, $busy)
{
    $coleccion = $db->usuarios;

    $filtro = ['name' => $nombre];
    $operacion = ['$set' => ['busy' => $busy]];

    $coleccion->updateOne($filtro, $operacion);

    
}

function buscarAlumno($db, $nombre)
{
    $resultado = $db->alumno->findOne(["name" => $nombre]);


    // Verificar si se encontró un usuario
    if ($resultado) {
        // Usuario encontrado
        return true;
    } else {
        // Usuario no encontrado
        return false;
    }
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
