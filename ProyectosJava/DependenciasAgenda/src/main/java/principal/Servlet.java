package principal;

import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class Servlet
 */
@WebServlet("/Servlet")
public class Servlet extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public Servlet() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		// response.getWriter().append("Served at: ").append(request.getContextPath());

		try {
			String accion = request.getParameter("accion");
			ArrayList<Contact> list = new ArrayList<Contact>();

			if (accion == null) {

				list = Metodos.LeerSql();
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("index.jsp").forward(request, response);

			}

			if (accion.equals("escribir")) {

				String dependencia = request.getParameter("dependencia");
				String name = request.getParameter("name");
				String tlf = request.getParameter("tlf");
				String edad = request.getParameter("edad");

				// convertir string en enteros Integer.parseInt(edad);
				Contact c = new Contact(name, tlf, Integer.parseInt(edad));

				if (dependencia.equals("csv")) {
					Metodos.crearCSV(c);
				} else {
					Metodos.Escribir(c);
				}

			} else if (accion.equals("verContacto")) {

				/*
				 * list=Metodos.Leer(); request.setAttribute("listaContacto", list);
				 */
				list = Metodos.LeerSql();
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("ver.jsp").forward(request, response);
			} else if (accion.equals("exportar")) {
				list = Metodos.LeerSql();
				Metodos.exportarCSV();
				request.getRequestDispatcher("Servlet?verContacto").forward(request, response);
			} else if (accion.equals("buscar")) {
				String name = request.getParameter("nombreBuscado");
				list = Metodos.buscarPorNombre(name);
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("verTodo.jsp").forward(request, response);
			}else if(accion.equals("verTodo")) 
			{
				
				list = Metodos.LeerSql();
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("verTodo.jsp").forward(request, response);
				
			}else if(accion.equals("eliminar")) 
			{
				String tlf= request.getParameter("tlf");
				Metodos.borrarContactoBD(tlf);
				request.getRequestDispatcher("Servlet?accion=verTodo").forward(request, response);
			}

		} catch (NumberFormatException e) {
			// TODO Auto-generated catch block

			e.printStackTrace();
			// request.getRequestDispatcher("error.jsp").forward(request, response);
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			// request.getRequestDispatcher("error.jsp").forward(request, response);
		} catch (ServletException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			// request.getRequestDispatcher("error.jsp").forward(request, response);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			// request.getRequestDispatcher("error.jsp").forward(request, response);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			// request.getRequestDispatcher("error.jsp").forward(request, response);
		}

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
