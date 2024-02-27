<%@page import="clases.Ejercicio"%>
<%@page import="clases.Usuario"%>
<%@page import="java.util.ArrayList"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<%
	ArrayList<Ejercicio> lista_ejercicio = (ArrayList<Ejercicio>) request.getAttribute("listaEjercicio");
	ArrayList<Usuario> lista_usuario = (ArrayList<Usuario>) request.getAttribute("listaUsuario");
	%>
 	<%
 	String usuario="";
 	for (int i = 0; i < lista_usuario.size(); i++) 
 	{
 		
 		 usuario=lista_usuario.get(i).getUser();
 	}  %>
   	
    <h1>Registro de Ejercicios</h1>
     <h1>Bienvenido <%=usuario %></h1>
    <% 
    if (lista_ejercicio == null || lista_ejercicio.isEmpty()) {
    %>
        <p>No se encontraron ejercicios.</p>
    <% } else {
        for (int i = 0; i < 4; i++) {
    %>
    <form action="Servlet?accion=insertarAnotaciones" method="post">
        <label for="ejercicio_<%= i %>">Ejercicio:</label>
        <select name="ejercicio_<%= i %>" id="ejercicio_<%= i %>">
            <option value="<%= lista_ejercicio.get(i).getId() %>"><%= lista_ejercicio.get(i).getNombre() %></option>
        </select>
        <br>
        <label for="anotacion_<%= i %>">Anotación:</label>
        <textarea name="anotacion_<%= i %>" id="anotacion_<%= i %>" rows="4" cols="50"></textarea>
        <br>
    <% } %>
    <input type="submit" value="Grabar">
    </form>
    <% } %>

</body>
</html>