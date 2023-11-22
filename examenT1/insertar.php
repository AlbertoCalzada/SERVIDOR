<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insertar.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="precio">Precio: </label>
        <input type="number" name="precio" id="precio" required>
        <label for="imagen">URL Imagen: </label>
        <input type="text" name="imagen" id="imagen"  required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

