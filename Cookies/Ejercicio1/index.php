<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <form action="./index.php" method="POST">
        <select name="clothes" id="clothes">
            <option value="elegir">Elegir</option>
            <option value="camiseta">Camisetas</option>
            <option value="pantalon">Pantalones</option>
            <input type="submit" value="Enviar">
        </select>
    </form>
    <?php
    if(isset($_POST["clothes"]) || isset($_COOKIE["Like"])){
        if (($fp = fopen("./csv/ropa.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
                $tipo = $data[0];
                $talla = $data[1];
                $color = $data[2];
                if(isset($_POST["clothes"]) && $tipo == $_POST["clothes"]){
                    echo "$tipo, $talla, $color <br>";
                } else if(isset($_COOKIE["Like"]) && $_COOKIE["Like"] == $tipo){
                    echo "$tipo, $talla, $color <br>";
                }
            }
        }
    }
    if(isset($_POST["clothes"])){
        $cookie_name = "Like";
        $cookie_value = $_POST["clothes"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }

    /*while($line = fgets($fp)){
        $tipo = explode(",", $line)[0];
        $talla = explode(",", $line)[1];
        $color = explode(",", $line)[2];
    }*/
    
    ?>
    
        
</body>

</html>