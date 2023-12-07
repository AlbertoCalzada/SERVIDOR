<?php
    require './bbdd/config.php';
    require './bbdd/methods.php';
 

    //insertAdmin($conn, "admin", "admin");
    //insertProduct($conn, new Product("PRINGLES patatas fritas original", 2.49, "https://m.media-amazon.com/images/I/71LDHh7AE2L.jpg"));
    //insertProduct($conn, new Product("MILKA Chocolate Blanco", 1.39, "https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/202208/09/00120647201852____4__600x600.jpg"));
    //insertProduct($conn, new Product("NESCAFÉ Classic", 4.99, "https://yourspanishcorner.com/2987-large_default/nescafe-classic-natural-200-g.jpg"));
    //insertProduct($conn, new Product("NESTLÉ Maxibon Cookie", 5.59, "https://m.media-amazon.com/images/I/81twurLn90L.jpg"));
    //insertProduct($conn, new Product("CASA TARRADELLAS Pizza Barbacoa", 3.30, "https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/201611/08/00118850400575____3__600x600.jpg"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/form.css">
    <title>Document</title>
</head>
<body>
<form action="./addProduct.php" method="post">
    <div class="campo">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="campo">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
    </div>
    <input type="submit" value="Entrar">
</form>
</body>
</html>

<?php $conn = null ?>