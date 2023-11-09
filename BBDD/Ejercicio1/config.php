<?php

$config = parse_ini_file('cfg.ini', true);

// Acceder a los valores
$servername = $config['database']['servername'];
$username = $config['database']['username'];
$password = $config['database']['password'];

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Crear la base de datos
  $nombreBBDD = "alumnos";
  $sql = "CREATE DATABASE IF NOT EXISTS $nombreBBDD";
  $conn->exec($sql);
  

  // Seleccionar la base de datos recién creada
  $conn->exec("USE $nombreBBDD");

  // Crear la tabla 'alumno'
  $sql = "CREATE TABLE IF NOT EXISTS alumno (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
  )";
  $conn->exec($sql);
  
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>
