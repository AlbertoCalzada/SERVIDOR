<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <style>
        label {
            display: block;
        }

        * {
            box-sizing: border-box;
        }

        body {
            width: 100%;
            font-family: Arial, sans-serif;
        }

        main {
            border: 2px solid black;
            margin: 0 auto;
            width: 40%;
            background-color: #f5f5f5;
        }

        form,
        h2 {
            margin: 10px auto;
            text-align: center;
        }

        label,
        input {
            margin-top: 10px;
            font-size: 15px;
        }

        p {
            text-align: center;
            color: red;
        }

        input[type=submit] {
            display: block;
            margin: 20px auto;
            background-color: aquamarine;
            padding: 10px 20px;

        }

        input[type=submit]:hover {

            background-color: #5bc0de;
            color: white;
        }

        a {
            text-decoration: none;
            margin: 10px;
        }

        a:hover {
            color: red;
        }

        @media screen and (max-width:500px) {
            main {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <main>
        <?php
        session_start();

        if (isset($_SESSION['messageGuardar'])) {
            $mensajeGuardar = $_SESSION['messageGuardar'];
            unset($_SESSION['messageGuardar']);
        } else {
            $mensajeGuardar = "";
        }
        ?>
        <a href="inicioSesion.php">Iniciar Sesión</a>
        <h2>Creando usuario</h2>

        <?php if ($mensajeGuardar !== "") {
            echo " <p> $mensajeGuardar</p>";
        } ?>
        <form action="guardar.php" method="POST">

            <label for="id_usuario">Introduce tu usuario : </label>
            <input type="text" id="id_usuario" name="usuario" required>
            <label for="id_password">Introduce tu contraseña : </label>
            <input type="password" id="id_password" name="password" required><br>
            <input type="submit" value="Registrarse">


            <!--
        $_SESSION["usuario"] = "Chris";
        $_SESSION["password"] = "1234";
        $usuario = $_SESSION["usuario"];
        $password = $_SESSION["password"];
        $fecha_actual = date("d-m-Y h:i:s");
        $myfile = fopen("credenciales.csv", "a") or die("Unable to open file!");

        fwrite($myfile, "$usuario,$password,$fecha_actual \n");
        fclose($myfile);
-->
        </form>

    </main>

</body>

</html>