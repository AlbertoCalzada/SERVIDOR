<?php
$config = parse_ini_file("./cfg.ini", true);
$servername = $config['database']['servername'];
$username = $config['database']['username'];
$password = $config['database']['password'];
$dbname = $config['database']['dbname'];

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

try {
  $sql = "CREATE DATABASE IF NOT EXISTS tienda";
  // use exec() because no results are returned
  $conn->exec($sql);
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

try {
  $conn->exec("USE tienda");

  $sql = "CREATE TABLE IF NOT EXISTS productos (
    nombre VARCHAR(255) NOT NULL,
    precio VARCHAR(255) NOT NULL,
    imagen VARCHAR(255) NOT NULL
    )";
  $conn->exec($sql);

  $sql = "CREATE TABLE IF NOT EXISTS administrador (
      usuario VARCHAR(255) NOT NULL,
      contrasena VARCHAR(255) NOT NULL

      )";
$conn->exec($sql);
  $password = '1234';
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO administrador (usuario, contrasena) VALUES ('admin', '$hash')";
  
  $conn->exec($sql);
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
