<?php
    $config = parse_ini_file("cfg.ini", true);
    $servername = $config['database']['servername'];
    $username = $config['database']['username'];
    $password = $config['database']['password'];
    $dbname = $config['database']['dbname'];

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // sql to create table
      $sql = "CREATE TABLE IF NOT EXISTS product (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255),
              price INT,
              path_img VARCHAR(255)
            )";
      // use exec() because no results are returned
      $conn->exec($sql);
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // sql to create table
      $sql = "CREATE TABLE IF NOT EXISTS admin(
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(255),
              pass VARCHAR(255)
            )";
      // use exec() because no results are returned
      $conn->exec($sql);
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
?>