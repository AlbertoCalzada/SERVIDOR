<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            width: 100%;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            background-color: aquamarine;
            padding: 10px 0;
        }

        div {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f5f5f5;
        }

        textarea {
            width: 90%;
            height: 80px;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type=submit] {
            display: block;
            margin: 0 auto;
            background-color: aquamarine;
            padding: 10px 20px;
        }

        input[type=submit]:hover {
            background-color: #5bc0de;
            color: white;
        }

        a {
            float: right;
            color: #333;
            text-decoration: none;
        }

        a:hover {
            color: red;
        }

        .errorScript {
            color: red;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <header>
        <h1>Chat</h1>
    </header>

    <div>
        <?php
        session_start();

        if (is_null($_SESSION["usuario"])) {
            header('Location: inicioSesion.php');
        } ?>

        <a href="./inicioSesion.php" onclick="Desconectarse()">Desconectarse</a>
        <?php
        $usuario = $_SESSION["usuario"];
        echo "<p>Has iniciado sesión con éxito: <strong>$usuario</strong></p>";

        if (isset($_SESSION['errorScript'])) {
            $errorScript = $_SESSION['errorScript'];
            unset($_SESSION['errorScript']);
        } else {
            $errorScript = "";
        }
        ?>

        <?php
        function Desconectarse()
        {
            session_destroy();
            header('Location: inicioSesion.php');
        }
        ?>

        <?php if ($errorScript !== "") {
            echo "<p class='errorScript'>$errorScript</p>";
        } ?>

        <form action="guardarChat.php" method="POST">
            <textarea name="mensaje"></textarea>
            <?php $fechaActual = date('d-m-Y H:i:s'); ?>
            <input type="text" name="fecha" value="<?php echo $fechaActual; ?>" hidden>
            <br>
            <input type="submit" value="Escribir comentario">
        </form>


        <?php
        $myfile = fopen("comentarios.csv", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $frase = fgets($myfile);
            $arrayFrase = explode(",", $frase);

            if (count($arrayFrase) >= 3) {
                echo "<br>";
                echo "<strong>Usuario</strong>: " . $arrayFrase[0] . "<br>";
                echo "<strong>Fecha</strong>: " . $arrayFrase[1] . "<br>";
                echo "<strong>Comentario</strong>: " . $arrayFrase[2] . "<br>";
            }
        }
        fclose($myfile);
        ?>

    </div>
</body>

</html>