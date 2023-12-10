<?php



function valorExisteEnTabla($conn, $tableName, $columnName, $value)
{
    $stmt = $conn->prepare("SELECT COUNT(*) FROM $tableName WHERE $columnName = :value");
    $stmt->bindParam(':value', $value);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    return $count > 0;
}

function InsertarCocheSQL($conn, $firstname, $lastname, $color)
{
    try {
        // Verificar si el coche ya existe
        if (valorExisteEnTabla($conn, 'coches', 'name', $firstname)) {
            echo "El coche ya existe en la base de datos.";
            return;
        }

        // Insertar coche
        $sql = "INSERT INTO coches (name, price, color) VALUES ('$firstname', '$lastname', '$color')";
        $conn->exec($sql);
        echo "Nuevo registro de coche creado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function InsertarUsuariosSQL($conn, $firstname, $lastname, $color)
{
    try {
        // Verificar si el usuario ya existe
        if (valorExisteEnTabla($conn, 'usuarios', 'name', $firstname)) {
            echo "El usuario ya existe en la base de datos.";
            return;
        }

        // Insertar usuario
        $sql = "INSERT INTO usuarios (name, pass, rol) VALUES ('$firstname', '$lastname', '$color')";
        $conn->exec($sql);
        echo "Nuevo registro de usuario creado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}




