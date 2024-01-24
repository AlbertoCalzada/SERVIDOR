<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1" %>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="ISO-8859-1">
		<title>Insert title here</title>
		<style type="text/css">
			.hidden {
				display: none;
			}
		</style>
	</head>

	<body>
		<form action="MiServlet" method="get">
			<label for="name">Nombre</label>
			<input type="text" id="name" name="name">
			<label for="telefono">Telefono</label>
			<input type="tel" id="telefono" name="telefono">
			<label for="edad">Edad</label>
			<input type="number" id="edad" name="edad">
			<input type="submit" value="Enviar">
			<input type="hidden" name="accion" value="escribir">


		</form>
		<form action="MiServlet">

			<input type="submit" value="Ver Contacto">

			<input type="hidden" name="accion" value="verContacto">
		</form>
		<br>
		<h3>Buscar</h3>
		<form action="MiServlet">
			<label for="name">Nombre</label>
			<input type="text" id="name" name="name">
			<input type="submit" value="Buscar">
			<input type="hidden" name="accion" value="buscar">

		</form>
		<!-- <a href="MiServlet?accion=listar">Ver contactos</a> -->
		<div class="hidden">
			<p>Contacto guardado con exito</p>
		</div>


	</body>

	</html>