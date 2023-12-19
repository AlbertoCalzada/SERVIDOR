<?php
// procesar_registro.php

require_once __DIR__ . '/bbdd/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoUsuario = $_POST["newUsr"];
    $nuevaContraseña = $_POST["newPwd"];

    // Asegúrate de aplicar medidas de seguridad, como hash y salting, en producción
    $usuariosCollection = $db->usuarios; // Ajusta el nombre de tu colección
    $usuarioExistente = $usuariosCollection->findOne(['nombreUsuario' => $nuevoUsuario]);

    if ($usuarioExistente) {
        echo "ko";
    } else {
        $usuariosCollection->insertOne(['nombreUsuario' => $nuevoUsuario, 'contrasena' => $nuevaContraseña]);
        echo "ok";
    }
}
?>
