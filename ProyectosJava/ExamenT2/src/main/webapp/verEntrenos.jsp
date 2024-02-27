<%@page import="clases.Entreno"%>
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
        
       ArrayList<Entreno> list= (ArrayList<Entreno>) request.getAttribute("listaEntreno");
    
  	
    %>
    
   
        <table border="1">
            <tr>
                <th>Datos</th>
               
            </tr>
            <% for (int i = 0; i < list.size(); i++) { %>
                <tr>
                    <td><%= list.get(i).getEjercicio1() %></td>
                    <td><%= list.get(i).getEjercicio2() %></td>
                    <td><%= list.get(i).getEjercicio3() %></td>
                    <td><%= list.get(i).getEjercicio4() %></td>
                    <td><%= list.get(i).getDescripcion1() %></td>
                     <td><%= list.get(i).getDescripcion1() %></td>
   
                </tr>
            <% } %>
        </table>
    
</body>
</html>