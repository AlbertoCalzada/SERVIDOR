<?php
$password = '1234';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "HASH: $hash";
$HASH = '$2y$10$Y1Gw.RVqw50SjPbQsy.T6.lojBcLXFDaO6.bhcOYRO1U0iPdKj4l6';
$verificacion = password_verify("1234", $hash);
echo "VERIFICACION: $verificacion";



