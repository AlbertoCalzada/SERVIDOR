<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros random</title>
    <style>
        .suma {
            display: inline-block;
        }

        form {
            border: 2px solid #ccc;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        body {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <form action="verificar.php" method="post">

        <div class="suma">
            <input type="number" name="numero1" value="<?php echo $numeroRandom1 = rand(0, 10); ?>" hidden>
            <label for=""><?php echo $numeroRandom1; ?></label>
            <?php $randomSymbol = [1 => "+", 2 => "-", 3 => "*"];
            $oprand = rand(1, count($randomSymbol));
            echo $randomSymbol[$oprand];
            ?>
            <input type="text" name="operacion" value="<?php echo $randomSymbol[$oprand]; ?>" hidden>
            <input type="number" name="numero2" value="<?php echo $numeroRandom2 = rand(0, 10); ?>" hidden>
            <label for=""><?php echo $numeroRandom2; ?></label>
            <?php echo " = " ?>
            <div>
                <input type="number" name="resultado">
            </div>
        </div>
        <br>


        <input type="submit" value="Comprobar">
    </form>

</body>

</html>