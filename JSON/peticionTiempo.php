<!DOCTYPE html>
<html>

<head>
    <title>PAGINA 1</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        select {
            padding: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #008CBA;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="./peticionTiempo.php" method="POST">
        <label for="municipio">Elige el municipio</label>
        <select name="municipio" id="municipio">           
            <option value="Leganes">Leganes</option>
            <option value="Burgos">Burgos</option>
            <option value="Hornos">Hornos</option>
        </select>
        <input type="submit" value="VER">
    </form>
    <?php
   
    if (isset($_POST["municipio"])) {
        $municipios = [
            'Leganes' => "https://www.aemet.es/xml/municipios/localidad_28074.xml",
            'Burgos' => "https://www.aemet.es/xml/municipios/localidad_09059.xml",
            'Hornos' => "https://www.aemet.es/xml/municipios/localidad_23043.xml"
        ];

        $municipio = $_POST["municipio"];

        $url = $municipios[$municipio];
        $xml = simplexml_load_file($url);
        $nombreMunicipio = $xml->nombre;
        $prediccion = $xml->prediccion->dia;

        echo "<table>";
        echo "<tr>";
        echo "<th>Municipio</th>";
        echo "<th>Dia</th>";
        echo "<th>Temperatura Máxima</th>";
        echo "<th>Temperatura Mínima</th>";
        echo "</tr>";

        $mostradoNombreMunicipio = false; 

        for ($i = 0; $i < count($prediccion); $i++) {
            $dia = $prediccion[$i];
            $diaFecha = $dia['fecha'];
            $tempMax = $dia->temperatura->maxima;
            $tempMin = $dia->temperatura->minima;

            echo "<tr>";

            if (!$mostradoNombreMunicipio) {
                echo "<td rowspan=" . count($prediccion) . ">$nombreMunicipio</td>";
                $mostradoNombreMunicipio = true;
            }

            echo "<td>$diaFecha</td>";
            echo "<td>$tempMax</td>";
            echo "<td>$tempMin</td>";
            echo "</tr>";
        }

        echo "</table>";
    } 
    ?>
</body>

</html>
