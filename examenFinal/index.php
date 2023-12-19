<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_CALZADA_TURNO_BABOR</title>
    <style>
        body{
            background-color: red;
        }
    </style>
</head>

<body>
    <form action="./mostrartabla.php" method="post">
        <select name="tablaElegida">Selecciona la tabla que quieres practicar

            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>Tabla del $i</option>";
            }
            ?>
        </select>
        <label for="idusuario">Usuario</label>
        <input type="text" id="idusuario" name="usuario" required>
        <label for="idpass">Contraseña</label>
        <input type="password" name="pass" id="idpass" required>
        <input type="submit"  value="Iniciar Sesión">
    </form>

    
</body>

</html>