<?php

function Insertar($conn, $nombre, $precio, $imagen)
{
    try {
        if (RegistroExiste($conn, $nombre)) {
            echo "El registro ya existe. No se ha realizado la inserción.";
            return;
        }

        $sql = "INSERT INTO producto (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')";
        $conn->exec($sql);
        echo "Nuevo registro creado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function RegistroExiste($conn, $nombre)
{
    $sql = "SELECT * FROM producto WHERE nombre = '$nombre'";
    $stmt = $conn->query($sql);
    return ($stmt->rowCount() > 0);
}

function VerProducto($conn)
{
    $sql = "SELECT * FROM productos";
    $stmt = $conn->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($productos as $producto) {
        echo "<option value='" . $producto["id"] . "'>" . $producto["nombre"] . "</option>";
    }
}
function ListarProducto($conn)
{
    $sql = "SELECT * FROM productos";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table class='table'>";
        echo "<tr class='bg-light'><th class='p-3'>Nombre</th><th class='p-3'>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr class='border'>";
            echo "<td class='p-3'>" . $alumno["nombre"] . "</td>";
            echo "<td class='p-3'>" . $alumno["precio"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        return "error";
    }
}
function ObtenerProductoPorId($conn, $id)
{
    $sql = "SELECT * FROM producto WHERE id = $id";
    $stmt = $conn->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function InsertarAdmin($conn)
{
    $password = '1234';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO administrador (usuario, contraseña) VALUES ('root', '$hash')";
    $conn->exec($sql);
}
function BuscarProducto($conn, $producto)
{
    try {
        $sql = "SELECT * FROM productos WHERE nombre = '$producto'";
        $stmt = $conn->query($sql);
        $mostrar = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($mostrar) > 0) {
            echo "<table>";
            echo "<tr><th>Producto</th><th>Precio</th><th>Imagen</th></tr>";

            foreach ($mostrar as $producto) {
                echo "<tr>";
                echo "<td>" . $producto["nombre"] . "</td>";
                echo "<td>" . $producto["precio"] . "</td>";
                echo "<td><img class='icon' height='100px' src=". $producto["imagen"] . "></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Producto no existe";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>
