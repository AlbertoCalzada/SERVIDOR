<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Crear la base de datos
  $nombreBBDD = "alumnos";
  $sql = "CREATE DATABASE IF NOT EXISTS $nombreBBDD";
  $conn->exec($sql);
  echo "Database created successfully<br>";

  // Seleccionar la base de datos recién creada
  $conn->exec("USE $nombreBBDD");

  // Crear la tabla 'alumno'
  $sql = "CREATE TABLE IF NOT EXISTS alumno (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
  )";
  $conn->exec($sql);
  echo "Table 'alumno' created successfully <br>";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>
