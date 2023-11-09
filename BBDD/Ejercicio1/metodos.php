<?php
function RegistroExiste($conn, $firstname, $lastname)
{
    $sql = "SELECT COUNT(*) as count FROM alumno WHERE firstname = :firstname AND lastname = :lastname";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($result['count'] > 0);
}

function Insertar($conn, $firstname, $lastname)
{
    try {
        // Verificar si el registro ya existe
        if (RegistroExiste($conn, $firstname, $lastname)) {
            echo "El registro ya existe. No se ha realizado la inserción.";
            return;
        }

        // Si no existe, realizar la inserción
        $sql = "INSERT INTO alumno (firstname, lastname) VALUES ('$firstname', '$lastname')";
        $conn->exec($sql);
        echo "Nuevo registro creado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function ListarAlumnos($conn)
{
    $sql = "SELECT * FROM alumno";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table class='table'>";
        echo "<tr class='bg-light'><th class='p-3'>Nombre</th><th class='p-3'>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr class='border'>";
            echo "<td class='p-3'>" . $alumno["firstname"] . "</td>";
            echo "<td class='p-3'>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        return "error";
    }
}


function BuscarAlumno($conn, $firstname)
{
    $sql = "SELECT * FROM alumno WHERE firstname ='$firstname'";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table class='table'>";
        echo "<tr class='bg-light'><th class='p-3'>Nombre</th><th class='p-3'>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr class='border'>";
            echo "<td class='p-3'>" . $alumno["firstname"] . "</td>";
            echo "<td class='p-3'>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        return "error";
    }
}

function ExportarToCsv($conn)
{
    try {
        // Select para los datos.
        $sql = "SELECT * FROM alumno";
        $stmt = $conn->query($sql);
        $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($alumnos)) {
            return "No se encontraron datos para exportar.";
        }

        $filename = "mysqlDatos.csv";
        $file = fopen($filename, "w") or die("No se ha podido crear el archivo csv!");

        // Escribe la cabecera con los nombres de las columnas
        $header = array_keys($alumnos[0]);
        fputcsv($file, $header);

        // Escribe los datos limpiando los valores para no tener espacios innecesarios
        foreach ($alumnos as $alumno) {
            foreach ($alumno as &$value) {
                $value = trim($value);
            }
            fputcsv($file, $alumno);
        }

        fclose($file);
        return "Éxito en la operación";
    } catch (Exception $e) {
        return "error: " . $e->getMessage();
    }
}



function ExportarToMySql($conn)
{
    $myfile = fopen("mysqlDatos.csv", "r") or die("No se ha podido leer el fichero!");

    // Ignorar la primera línea 
    fgetcsv($myfile);

    while (($arrayFrase = fgetcsv($myfile)) !== false) {
        // Limpiar valores de saltos de línea
        $firstname = trim($arrayFrase[1]);
        $lastname = trim($arrayFrase[2]);

        // Si no existe el registro se inserta.
        if (!RegistroExiste($conn, $firstname, $lastname)) {
            Insertar($conn, $firstname, $lastname);
        }
    }

    fclose($myfile);

    
    return "Éxito en la operación";
}

