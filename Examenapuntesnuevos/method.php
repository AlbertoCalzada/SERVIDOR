<?php
function InsertarProducto($conn, $nombre, $precio, $imagen)
{
    try {      // set the PDO error mode to exception
        $sql = "INSERT INTO Productos (nombre, precio, imagen)
        VALUES ('$nombre', '$precio', '$imagen')";
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
function BuscarProducto($conn, $producto)
{
    $sql = "SELECT * FROM Productos WHERE nombre = '$producto'";
    $stmt = $conn->query($sql);
    $lidl = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($lidl) > 0) {
        echo "<table>";
        echo "<tr><th>Producto</th><th>Precio</th><th>Imagen</th></tr>";

        foreach ($lidl as $lidl) {
            echo "<tr>";
            echo "<td>" . $lidl["nombre"] . "</td>";
            echo "<td>" . $lidl["precio"] . "</td>";
            echo "<td><img class='icon' height='100px' src=". $lidl["imagen"] . "></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Producto no existe";
    }
}
function insertAdmin($conn, $usr, $pwd)
{
    try {
        $sql = "INSERT INTO usuario (usr, pwd) VALUES ('$usr', '$pwd')";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }
}