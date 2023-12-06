

<?php
include 'contacto.php';
require_once __DIR__ . '/../vendor/autoload.php';
$config = parse_ini_file('config.ini', true);


use MongoDB\Operation\InsertOne;
use PSpell\Config;





$cliente = new MongoDB\Client("mongodb+srv://calzada:calzada@clusteralberto.ltyxi3z.mongodb.net/?retryWrites=true&w=majority"); //hacer la conexion a mongo
//echo "Conexion exitosa <br>";
// Acceder a los valores

$bbdd = $config['bbdd'];
$coleccion = $config['coleccion'];

/*$coleccion = $cliente->local->amigos; //a la base de datos y luego a la coleccion*/

$acceso = $cliente->$bbdd->$coleccion;

function Insertar($nombre, $telefono, $acceso)
{
    //metemos lo que queramos insertar

    $contacto = new Contacto($nombre, $telefono);

    $acceso->insertOne($contacto);
}

function Visualizar($acceso)
{
    // Obtener todos los documentos de la colección. Como un select

    $resultado = $acceso->find();


    foreach ($resultado as $documento) {

        $nombre = $documento['nombre'];
        $telefono = $documento['telefono'];

        $contactos[] = new Contacto($nombre, $telefono);
    }
    return $contactos;
}

function Buscar($nombre, $acceso)
{
    

    $resultado = $acceso->find(["nombre" => $nombre]);

    
    $contactos = [];


    if (!empty($resultado)) {
        foreach ($resultado as $documento) {
           
            $contactos[] = new Contacto(
                $documento->nombre,
                $documento->telefono
            );
        }
    }

    
    return $contactos;
}

?>