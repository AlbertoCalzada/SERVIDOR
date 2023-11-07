<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // Establecer el modo de error de PDO en excepción
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión exitosa<br>";
  
  // Verificar si la base de datos ya existe
  $databaseName = "alumnos";
  $query = "CREATE DATABASE IF NOT EXISTS $databaseName";
  $conn->exec($query);
  echo "Base de datos creada o ya existe: $databaseName<br>";
} catch(PDOException $e) {
  echo "Fallo en la conexión: " . $e->getMessage();
}

// Crear tabla
try {
  $connTable = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $connTable->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE IF NOT EXISTS alumno (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL    
  )";
  // Utilizar exec() porque no se devuelven resultados
  $connTable->exec($sql);
  echo "Tabla alumno creada o ya existe exitosamente";
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
?>
