<?php

session_start();

require './bbdd/methods.php';

if (isset($_SESSION['rol'])) {
   

 
    if ($_SESSION['rol'] != 2) {
        header('Location: ./signin.php');
    }
}

if(isset($_POST['nombreCamarero']))
{
    $nombre=$_POST['nombreCamarero'];
    $pass=$_POST['pass'];

    if(buscarUsuario($db,$nombre))
    {
        echo "El  usuario ya existe";

    }else
    {
        insertPersonal($db,$nombre , $pass,1);
    }

}

if(isset($_POST['nombreCamareroExpulsado']))
{
    $nombre=$_POST['nombreCamareroExpulsado'];
    

    deleteUsuario($db,$nombre);

}

if(isset($_POST['menu']))
{
   $nombre= $_POST['nombre'];
   $primero=$_POST['primero'];
   $segundo=$_POST['segundo'];
   $postre=$_POST['postre'];

  
   
   insertarMenu($db,$nombre, $primero, $segundo, $postre);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del ADMIN</title>
</head>

<body>
    <h2>Crear menu</h2>
    <form action="./administrador.php" method="post">

        <label for="">Nombre del menu</label>
        <input type="text" name="nombre">
        <label for="">Primero:</label>
        <input type="text" name="primero">
        <label for="">Segundo:</label>
        <input type="text" name="segundo">
        <label for="">Postre:</label>
        <input type="text" name="postre">
        <input type="submit" name="menu" value="Crear Menu">
    </form>
    <hr>

    <h2>Insertar Personal</h2>
    <form action="./administrador.php" method="post">

        <label for="">Nombre del camarero</label>
        <input type="text" name="nombreCamarero">
        <label for="">Contraseña:</label>
        <input type="password" name="pass">

        <input type="submit" value="Insertar">
    </form>
    <hr>
    
    <h2>Expulsar Personal</h2>
    <form action="./administrador.php" method="post">

        <label for="">Nombre del camarero</label>
        <input type="text" name="nombreCamareroExpulsado">

        <input type="submit" value="Expulsar">
    </form>
</body>

</html>