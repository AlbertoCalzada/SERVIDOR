<%@page import="principal.Contact"%>
<%@page import="java.util.ArrayList"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<style type="text/css">

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
</head>
<body>
<h1>Lista de Contactos</h1>
    <% 
    ArrayList<Contact> lista_contactos = (ArrayList<Contact>) request.getAttribute("listaContacto");
    if (lista_contactos == null || lista_contactos.isEmpty()) {
    %>
        <p>No se encontraron contactos.</p>
    <% } else { %>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Edad</th>
            </tr>
            <% for (Contact contacto : lista_contactos) { %>
                <tr>
                    <td><%= contacto.getName() %></td>
                    <td><%= contacto.getTlf() %></td>
                    <td><%= contacto.getEdad() %></td>
                     <td><form action="Servlet?accion=eliminar" method="post">
                    <input type="hidden" name="tlf" value=<%=contacto.getTlf() %>>
                   <input type="submit" value="Borrar">
                    </form></td>
                </tr>
            <% } %>
        </table>
    <% } %>

    <a href="./index.jsp">Ir a insertar</a>
</body>
</html>