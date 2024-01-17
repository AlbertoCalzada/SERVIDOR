<%@ page import="java.util.ArrayList" %>
<%@ page import="clases.Contact" %>
<%@ page import="clases.Metodos" %>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Lista de contactos</title>
</head>
<body>
    <h2>Contactos</h2>

    <% 
        
        String ruta = "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
        
        
        ArrayList<Contact> list = Metodos.Leer(ruta);
    %>
    
    <% if (list != null) { %>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
            </tr>
            <% for (int i = 0; i < list.size(); i++) { %>
                <tr>
                    <td><%= list.get(i).getName() %></td>
                    <td><%= list.get(i).getTlf() %></td>
                </tr>
            <% } %>
        </table>
    <% } else { %>
        <p>No hay contactos disponibles.</p>
    <% } %>
</body>
</html>
