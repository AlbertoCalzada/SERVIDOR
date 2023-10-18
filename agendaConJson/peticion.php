<!DOCTYPE html>
<html>

<head>
    <title>PAGINA 1</title>
</head>

<body>

    <?php

    //$url = "192.168.4.224/";
   $url = "192.168.4.243/2-daw/Servidor/PHP/Ejercicios/Ejercicio/AgendaJSON/saveAgenda.php"; 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    curl_close($curl);

    $objeto_json = json_decode($json);
    for ($i=0; $i <count($objeto_json) ; $i++) { 
        echo $objeto_json[$i]->name."\n";
        echo $objeto_json[$i]->surname."\n";
        echo $objeto_json[$i]->tel."\n";
        echo "<br>";
    }
   
    //var_dump($objeto_json);
    ?>

</body>

</html>


