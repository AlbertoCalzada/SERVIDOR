<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="MyServlet">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <label for="edad">Edad</label>
    <input type="number" id="edad" name="edad">
    <input type="submit" value="Enviar">
</form>
</body>
</html>