<?php



function Insert($conn, $firstname, $lastname)
{
    try {
        $sql = "INSERT INTO alumno (firstname, lastname) VALUES (:firstname, :lastname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        
        // Seleccionar la base de datos
        $conn->exec("USE alumnos");

        $stmt->execute();
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


function Select($conn, $table)
{
    try {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        $row = $result->fetch();  // Obtiene el primer registro (si existe)

        if ($row) {
            // Muestra los valores del primer registro
            echo "First Name: " . $row['firstname'] . " Last Name: " . $row['lastname'] . "<br>";
            echo "Record retrieved successfully";
        } else {
            echo "No records found.";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}



?>
