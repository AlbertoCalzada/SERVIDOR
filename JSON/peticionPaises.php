<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            text-decoration: none;
            color: red;
        }
        
        a:hover {
            text-decoration: none;
            color: blue;
            text-shadow: 1px 1px 1px blue, -1px -1px 1px green;
            transform: rotate(80deg);
        }

        table {
            margin: 0 auto;
            width: 100%;
            background-color: #f4f4f4;
            border-collapse: collapse;
            border: 3px solid black;
            box-shadow: 0px 0px 15px purple;
        }

        th,
        tr,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            font-size: 18px;
            background-color: #24C09E;
            color: #fff;
        }

        tr:first-child {
            font-weight: bold;
            background-color: #24C09E;
        }

        tr:nth-child(even) {
            background-color: #ccc; /* Cambié el color de fondo para mejorar la legibilidad */
        }
    </style>
</head>

<body>
    <table>
        <?php
        $url = "https://restcountries.com/v3.1/all";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $json = curl_exec($curl);
        curl_close($curl);
        $objeto_json = json_decode($json);
        echo "<tr>";
        echo "<th>Pais</th>";
        echo "<th>Capital</th>";
        echo "<th>Enlace</th>";
        echo "</tr>";

        for ($i = 0; $i < count($objeto_json); ++$i) {
            echo "<tr>";
            echo "<td>" . $objeto_json[$i]->name->common . "</td>";
            if (isset($objeto_json[$i]->capital[0])) {
                echo "<td>" . $objeto_json[$i]->capital[0] . "</td>";
            } else {
                echo '<td> No tiene capital </td>';
            }
            $urlMap = $objeto_json[$i]->maps->googleMaps;
            echo "<td><a target=_blank href='$urlMap'>$urlMap</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
