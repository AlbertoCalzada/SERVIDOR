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
        
       ArrayList<Contact> list= (ArrayList<Contact>) request.getAttribute("listaContacto");
    
  	
    %>
    
    <% if (list.size()!=0) { %>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                 <th>Edad</th>
            </tr>
            <% for (int i = 0; i < list.size(); i++) { %>
                <tr>
                    <td><%= list.get(i).getName() %></td>
                    <td><%= list.get(i).getTlf() %></td>
                    <td><%= list.get(i).getEdad() %></td>
                    <td><form action="MiServlet">
                    <input type="hidden" name="tlf" value=<%=list.get(i).getTlf() %>>
                   <input type="hidden" name="accion" value="borrar">
                   <input type="submit" value="Borrar">
                    </form></td>
                </tr>
            <% } %>
        </table>
    <% } else { %>
        <p>No hay contactos disponibles.</p>
    <% } %>
</body>
</html>
