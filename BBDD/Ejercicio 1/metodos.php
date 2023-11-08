<?php

function Insertar($conn, $firstname, $lastname)
{
    try {
        $sql = "INSERT INTO alumno (firstname, lastname) VALUES ('$firstname', '$lastname')";
        $conn->exec($sql);
        echo "New record created successfully";
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
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr>";
            echo "<td>" . $alumno["firstname"] . "</td>";
            echo "<td>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}

function BuscarAlumno($conn, $firstname)
{
    $sql = "SELECT * FROM alumno WHERE firstname ='$firstname'";
    $stmt = $conn->query($sql);
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($alumnos) > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";

        foreach ($alumnos as $alumno) {
            echo "<tr>";
            echo "<td>" . $alumno["firstname"] . "</td>";
            echo "<td>" . $alumno["lastname"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}


