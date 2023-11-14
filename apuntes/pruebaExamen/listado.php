<?php
include 'funciones.php';

session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

$listaCompra = getListaCompra();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto'])) {
  $producto = $_POST['producto'];
  addProducto($producto);
  header('Location: listado.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
  $indice = $_POST['borrar'];
  deleteProducto($indice);
  header('Location: listado.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exportar'])) {
  exportToCSV();
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de la Compra</title>
</head>
<body>
  <h1>Lista de la Compra</h1>
  <p>Bienvenido, <?php echo $_SESSION['usuario']; ?>.</p>

  <form method="POST">
    <label for="producto">Producto:</label>
    <input type="text" name="producto" id="producto">
    <button type="submit">Agregar</button>
  </form>

  <table>
    <tr>
      <th>Usuario</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Comentarios</th>
      <th></th>
    </tr>
    <?php for ($i = 0; $i < count($listaCompra); $i++) { ?>
      <tr>
        <td><?php echo $_SESSION['usuario']; ?></td>
        <td><?php echo $listaCompra[$i]['producto']; ?></td>
        <td><?php echo $listaCompra[$i]['cantidad']; ?></td>
        <td><?php echo $listaCompra[$i]['comentarios']; ?></td>
        <td>
          <form method="POST" style="display:inline;">
            <input type="hidden" name="borrar" value="<?php echo $i; ?>">
            <button type="submit">Borrar</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>

  <form method="POST">
    <button type="submit" name="exportar">Exportar a CSV</button>
  </form>
</body>
</html>