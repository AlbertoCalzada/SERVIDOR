<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Agenda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="fondoAgenda">
    <div class="contenedor">
        <h1>Agenda</h1>
        <table class="tabla">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
            </tr>

            <?php
            $myfile = fopen("listacontactos.csv", "r") or die("No se ha podido leer el fichero!");

            while (!feof($myfile)) {
                $frase = fgets($myfile);
                $arrayFrase = explode(",", $frase);

                if (count($arrayFrase) == 3) {
                    echo "<tr>";
                    echo "<td>$arrayFrase[0]</td>";
                    echo "<td>$arrayFrase[1]</td>";
                    echo "<td>$arrayFrase[2]</td>";
                    echo "</tr>";
                }
            }

            fclose($myfile);
            ?>
        </table>
    </div>
</body>
</html>
