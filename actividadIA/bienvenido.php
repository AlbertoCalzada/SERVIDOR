<!-- bienvenido.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>

<?php
// Obtén el parámetro 'usr' de la URL
$nombreUsuario = isset($_GET['usr']) ? $_GET['usr'] : '';

// Muestra el mensaje de bienvenida
echo "<h2>Bienvenido, $nombreUsuario</h2>";
?>

</body>
</html>
