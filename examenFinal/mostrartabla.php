<?php

session_start();


require './bbdd/accesoBD.php';

if (isset($_POST['usuario'])) {

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $tablaElegida = $_POST['tablaElegida'];
    
    
    
    $_SESSION['tabla']=$tablaElegida;

    $_SESSION['usuario']=$usuario;
   
    
   
}else
{
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBERTO_CALZADA_TURNO_BABOR</title>
    <style>
        label{
            display:inline-block;
        }
       
        body{
            background-color: red;
        }
  
    </style>
</head>

<body>
    <form action="./mostrarcorreccion.php" method="post">
       
        <?php
         for ($i = 1; $i <= 10; $i++) 
         {  echo  "<label for='tabla$i'>$tablaElegida x $i=</label>";
            echo" <input id='tabla$i' name='resultado$i' required type='number'>";
            
            echo "<br>";
        
        }
     
       
        echo "<br>";
        ?>
        
        <input type="submit" name="corregir" value="Corregir">
    </form> 
</body>

</html>
