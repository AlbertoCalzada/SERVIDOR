<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recoge Datos</title>

    <style>
        body{
            background-color:<?php echo $_REQUEST["colorElegido"]; ?>
        }
        </style>
</head>

<body>
<?php

$numeroRandom=$_POST["frase"];

$senteces=["La vida es maravillosa","La vida es dura", "La vida es horrible", "La vida es increible"];

echo "<style>
p{color:rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")
</style>";

echo 
"<p> $senteces[$numeroRandom] </p>";


?>
    
</body>

</html>