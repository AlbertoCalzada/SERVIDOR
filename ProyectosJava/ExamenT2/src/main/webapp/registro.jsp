<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
    <form action="Servlet?accion=registro" method="post">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Registrarse">
    </form>
    <a href="./index.jsp">Iniciar sesion</a>
</body>
</html>