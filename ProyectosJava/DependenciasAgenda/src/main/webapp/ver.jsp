<%@page import="principal.Contact"%>
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
	ArrayList<Contact> lista_contactos = (ArrayList<Contact>) request.getAttribute("listaContacto");
	%>
    <h1>Lista de Contactos</h1>
    <% 
    if (lista_contactos == null || lista_contactos.isEmpty()) {
    %>
        <p>No se encontraron contactos.</p>
    <% } else {
        String valor = "";
        for (int i = 0; i < lista_contactos.size(); i++) {
            valor += "<option value=" + lista_contactos.get(i).getId() + ">" + lista_contactos.get(i).getName() + "</option>";
        }
    %>

    <select>
        <%=valor%>
    </select>
    <% } %>

    <a href="./index.jsp">Ir a insertar</a>
</body>
</html>