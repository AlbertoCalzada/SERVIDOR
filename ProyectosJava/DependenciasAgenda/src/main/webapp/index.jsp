<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>

<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>

<body>


	<form action="Servlet?accion=escribir" method="post">
		<label for="">CSV</label> 
		<input type="radio" name="dependencia"
			value="csv"><br> 
			<label for="">MYSQL</label> 
			<input type="radio" name="dependencia" value="mysql"><br>
		<br> nombre: <input type="text" name="name"> tlf: 
		<input
			type="text" name="tlf"> edad:<input type="number" name="edad">
		<input type="submit" value="Grabar">
	</form>
	<br>
	<br>
	<a href="Servlet?accion=verContacto">Ir a Ver por Select</a>
	<br>
	<br>
	<a href="Servlet?accion=verTodo">Ir a Ver con todos sus datos</a>
	<br>
	<br>
	<button>
		<a href="Servlet?accion=exportar">Exportar a CSV</a>
	</button>
	<br> 
	<br><br>
	Buscar por nombre:
	<form action="Servlet?accion=buscar" method="post">
		<input type="text" name="nombreBuscado"> <input type="submit"
			value="Buscar">
	</form>
</body>

</html>