<?php

include("metodos.php");

function ExportarToCsv($conn)
{
    try {
        // Select para los datos.
        $sql = "SELECT * FROM alumno";
        $stmt = $conn->query($sql);
        $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($alumnos)) {
            die("No se encontraron datos para exportar.");
        }

        $filename = "mysqlDatos.csv";
        $file = fopen($filename, "w") or die("No se ha podido crear el archivo csv!");

        // Escribe la cabecera con los nombres de las columnas
        $header = array_keys($alumnos[0]);
        fputcsv($file, $header);

        // Escribe los datos
        foreach ($alumnos as $alumno) {
            fputcsv($file, $alumno);
        }

        fclose($file);
        echo "Los datos se exportaron correctamente a $filename";
    } catch (Exception $e) {
        echo "Error al exportar datos: " . $e->getMessage();
    }
}

function ExportarToMySql($conn)
{

    $myfile = fopen("mysqlDatos.csv", "r") or die("No se ha podido leer el fichero!");

    while (!feof($myfile)) {
        $frase = fgets($myfile);
        $arrayFrase = explode(",", $frase);

        if (count($arrayFrase) > 1) {
            
            Insertar($conn,$arrayFrase[1],$arrayFrase[2]);
        }
    }

    fclose($myfile);
}
