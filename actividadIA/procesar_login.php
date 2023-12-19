<?php
// procesar_login.php

require_once __DIR__ . '/bbdd/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usr"];
    $contrasena = $_POST["pwd"];

    $usuariosCollection = $db->usuarios; // Ajusta el nombre de tu colección
    $query = ['nombreUsuario' => $usuario, 'contrasena' => $contrasena];
    $usuarioEncontrado = $usuariosCollection->findOne($query);

    if ($usuarioEncontrado) {
        // Envía una respuesta JSON con el resultado y el nombre de usuario
        echo json_encode(['result' => 'ok', 'usuario' => $usuarioEncontrado['nombreUsuario']]);
    } else {
        // Envía una respuesta JSON indicando que las credenciales son incorrectas
    }
    echo json_encode(['result' => 'ko']);
} else {

    echo json_encode(['result' => 'ko']);
}
