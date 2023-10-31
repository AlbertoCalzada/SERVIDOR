<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <form action="./pruebaCookies.php" method="POST">
        <select name="clothes" id="clothes">
            <option value="elegir">Elegir</option>
            <option value="camiseta">Camisetas</option>
            <option value="pantalon">Pantalones</option>
            <input type="submit" value="Enviar">
        </select>
    </form>

    <?php
 
    if(isset($_POST["clothes"]))
    {
        if (($fp = fopen("./csv/ropa.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
                $tipo = $data[0];
                $talla = $data[1];
                $color = $data[2];
                if(isset($_POST["clothes"]) && $tipo == $_POST["clothes"]){
                    echo "$tipo, $talla, $color <br>";
                } 
            }
        }

        fclose($fp);
        $cookie_value = $_POST["clothes"];
        setcookie("ropa",$cookie_value,time()+3600);
    }

    if(isset($_COOKIE["ropa"]) && !isset($_POST["clothes"]))
    {
        if (($fp = fopen("./csv/ropa.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
                $tipo = $data[0];
                $talla = $data[1];
                $color = $data[2];
                if(isset($_COOKIE["ropa"]) && $tipo == $_COOKIE["ropa"]){
                    echo "$tipo, $talla, $color <br>";
                } 
            }
        }
    }
    ?>

</body>

</html>