<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoge Datos</title>

    <style>
             
        .coloreado {
        display: inline-block;
        border:solid;
        height: 20px;
        width: 20px;
        background-color: <?php echo $_POST["colorElegido"]; ?>;
        }
    </style>
</head>

<body>

    <?php

    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    $sexo=$_POST["sexo"];
    $noticias=$_POST["noticias"];
   

    echo " Te llamas $nombre. , tienes $edad. años, tu sexo es: $sexo. y tu color favorito es el :   <div class='coloreado'></div><br>";
    echo "$noticias. vas a recibir noticias."

    ?>
</body>

</html>