<?php
include 'funciones.php';

$usuarios = getUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'];

  if (in_array($usuario, $usuarios)) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: listado.php');
    exit();
  } else {
    $error = 'Usuario no válido. Por favor, intenta nuevamente.';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio de Sesión</title>
</head>
<body>
  <h1>Inicio de Sesión</h1>

  <?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>

  <form method="POST">
    <label for="usuario">Usuario:</label>
    <select name="usuario" id="usuario">
      <?php foreach ($usuarios as $usuario) { ?>
        <option value="<?php echo $usuario; ?>"><?php echo $usuario; ?></option>
      <?php } ?>
    </select>
    <br>
    <button type="submit">Iniciar sesión</button>
  </form>
</body>
</html>