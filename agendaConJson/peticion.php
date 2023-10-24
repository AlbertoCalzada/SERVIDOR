<!DOCTYPE html>
<html>

<head>
    <title>PAGINA 1</title>
</head>

<body>

    <?php

    //$url = "192.168.4.224/";
    $url = "192.168.4.228/servidor/agenda_json/saveagenda.php";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    curl_close($curl);

    $objeto_json = json_decode($json);
    for ($i = 0; $i < count($objeto_json); $i++) {
        echo $objeto_json[$i]->nombre . "\n";
        echo $objeto_json[$i]->apellido . "\n";
        echo $objeto_json[$i]->telefono . "\n";
        echo "<br>";
    }

    //var_dump($objeto_json);
    ?>

</body>

</html>