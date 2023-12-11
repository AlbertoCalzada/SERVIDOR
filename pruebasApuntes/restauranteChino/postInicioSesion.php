<?php
session_start();

if (isset($_SESSION['rol'])) 
{
    $rolUsuario = $_SESSION['rol'];
    $user = $_SESSION['user'];
    echo "<ul>";
    if ($rolUsuario == 0) 
    
    {
        echo "<h2>Bienvenido $user</h2>";
        echo "<li><a href='./reservas.php'>Pincha aqui para reservar</a></li>";
        echo "<li><a href='./vermenu.php'>Ver menu</a></li>";
    }

    if($rolUsuario==2)
    {
        echo "<h2>Bienvenido $user</h2>";
        echo "<li><a href='./administrador.php'>Administrador</a></li>";
    }


    echo "</ul>";
}else
{
    header('Location: ./signin.php');
}


?>

