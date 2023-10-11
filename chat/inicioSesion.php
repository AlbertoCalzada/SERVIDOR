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

        .errorLogin {
            color: red;
            text-align: center;
        }

        .registroCorrecto {
            text-align: center;
            color: green;
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

        @media screen and (max-width:500px){
            main{
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();


    if (isset($_SESSION['error_message'])) {
        $error_message = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    } else {
        $error_message = "";
    }
    if (isset($_SESSION['messageGuardar'])) {
        $mensajeGuardar = $_SESSION['messageGuardar'];
        unset($_SESSION['messageGuardar']);
    } else {
        $mensajeGuardar = "";
    }
    ?>
    <main>
        <a href="registro.php">Registrarse</a>
        <h2>Login</h2>

        <?php if ($error_message !== "") {
            echo " <p class='errorLogin'> $error_message</p>";
        } ?>

        <?php if ($mensajeGuardar !== "") {
            echo " <p class='registroCorrecto'> $mensajeGuardar</p>";
        } ?>

        <form action="comprobar.php" method="POST">

            <label for="id_usuario">Introduce tu usuario : </label>
            <input type="text" id="id_usuario" name="usuario" required>
            <label for="id_password">Introduce tu contraseña : </label>
            <input type="password" id="id_password" name="password" required><br>
            <input type="submit" value="Login">



        </form>

    </main>

</body>

</html>