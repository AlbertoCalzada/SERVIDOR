<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="MiServlet" method="get">
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name">
    <label for="telefono">Telefono</label>
    <input type="text" id="telefono" name="telefono">
    <input type="submit" value="Enviar">
    
    <a href="verContacto.jsp">
            <button type="button">Ver Contactos</button>
        </a>
</form>


</body>
</html>