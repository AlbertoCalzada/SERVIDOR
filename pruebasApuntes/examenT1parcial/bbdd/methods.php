<?php

function InsertarProducto($conn, $name, $price, $path_img)
{
    try {


        $sql = "INSERT INTO product (name, price, path_img) VALUES ('$name', '$price','$path_img')";
        $conn->exec($sql);
        return $name . " ha sido añadido correctamente";
    } catch (PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
    }
}

function insertAdmin($conn, $username, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO admin(username, pass)
        VALUES ('$username', '$password')";
        // use exec() because no results are returned
        $conn->exec($sql);
        return $username . " ha sido añadido correctamente";
    } catch (PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
    }
}

function getAccess($conn, $username, $pass) {
    try {
        $sql = "SELECT * FROM admin WHERE username ='$username' and pass ='$pass'";
        // use exec() because no results are returned
        $stmt = $conn->query($sql);
        // Obtener todos los resultados (si existen)
        $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar información de depuración
        var_dump($admins);


        foreach ($admins as $admin) {
            if (password_verify($pass, $admin['pass'])) {
                // Acceso concedido
                return true;
            }
        }
        // Acceso denegado
        return false;

    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        return false;
    }
}

function verProductos($conn){
    try {
        $sql = "SELECT * FROM product";
        // use exec() because no results are returned
        $allProducts = $conn->query($sql);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    foreach($allProducts as $single)
    {
        $products[] = new Product($single["name"], $single["price"], $single["path_img"]);
    }
    return $products;
}

   