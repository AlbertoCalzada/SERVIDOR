<?php

$config = parse_ini_file('config.ini', true);
                
// Acceder a los valores

$username = $config['username'];
$password = $config['password'];
$namebd = $config["namebd"];

$servername = $config["servername"];
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    // Crear la base de datos
    
    $sql = "CREATE DATABASE IF NOT EXISTS $namebd";
    $conn->exec($sql);
   
   
    // Seleccionar la base de datos recién creada
    $conn->exec("USE $namebd");
   
    // Crear la tabla 'coches'
    $sql = "CREATE TABLE IF NOT EXISTS coches (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        price DECIMAL(30) NOT NULL,
        color VARCHAR(30) NOT NULL
    )";
    $conn->exec($sql);

    
    // Crear la tabla 'usuarios'
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        pass VARCHAR(30) NOT NULL,
        rol INT NOT NULL,
        money INT NOT NULL
    )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>