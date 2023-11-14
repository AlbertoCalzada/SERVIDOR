<?php
function getUsers() {
  $config = parse_ini_file('config.ini');
  $usuarios = explode(',', $config['usuarios']);
  return $usuarios;
}

function getListaCompra() {
  // Aquí puedes implementar la lógica para obtener la lista de la compra desde la base de datos o cualquier otro medio de almacenamiento
  // Retorna un array con los productos de la lista de la compra
  return [];
}

function addProducto($producto) {
  // Aquí puedes implementar la lógica para agregar un producto a la lista de la compra en la base de datos o cualquier otro medio de almacenamiento
}

function deleteProducto($indice) {
  // Aquí puedes implementar la lógica para eliminar un producto de la lista de la compra en la base de datos o cualquier otro medio de almacenamiento
}

function exportToCSV() {
  // Aquí puedes implementar la lógica para generar el contenido del archivo CSV con la lista de la compra y enviarlo al navegador para su descarga
}

function getListaCompraJSON() {
  // Aquí puedes implementar la lógica para obtener la lista de la compra en formato JSON desde la base de datos o cualquier otro medio de almacenamiento
  // Retorna la lista de la compra en formato JSON
  return json_encode([]);
}
?>