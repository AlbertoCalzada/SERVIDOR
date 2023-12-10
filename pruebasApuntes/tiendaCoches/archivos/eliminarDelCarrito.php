<?php
if (isset($_POST["cocheEliminar"])) {
    $cookie = $_POST["cocheEliminar"];
    
    // Depuración: imprime el nombre de la cookie a eliminar
    echo "Nombre de la cookie a eliminar: " . "carrito$cookie";

    // eliminar cookie
    setcookie("carrito$cookie", "");

    // Redirigir de vuelta a la página del carrito o a donde sea necesario
   header("Location: ./micarrito.php");
    exit();
}
?>
