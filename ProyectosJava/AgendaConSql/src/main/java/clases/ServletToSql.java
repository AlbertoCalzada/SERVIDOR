package clases;

import java.io.IOException;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ServletToSql
 */
@WebServlet("/ServletToSql")
public class ServletToSql extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ServletToSql() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		String accion = request.getParameter("accion");
		ArrayList<Contact> list = new ArrayList<Contact>();

		if (accion != null) {
			if (accion.equals("escribir")) {

				String name = request.getParameter("name");
				String tlf = request.getParameter("telefono");
				String edad = request.getParameter("edad");

				//convertir string en enteros Integer.parseInt(edad);
				Contact c = new Contact(name, tlf,Integer.parseInt(edad));

				Metodos.Escribir(c);
				
				response.sendRedirect("index.jsp");
				
			} else if (accion.equals("verContacto")) {

				/*list=Metodos.Leer();
				request.setAttribute("listaContacto", list);*/
				list= Metodos.LeerSql();
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("verContacto.jsp").forward(request, response);
			}else if(accion.equals("buscar"))
			{
				
				String name = request.getParameter("name");
				list=Metodos.Buscar(name);
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("verContacto.jsp").forward(request, response);
			}else if (accion.equals("borrar")) 
			{
				String tlf = request.getParameter("tlf");
				list=Metodos.Borrar(tlf);
				request.setAttribute("listaContacto", list);
				request.getRequestDispatcher("ServletToSql?accion=verContacto").forward(request, response);
			}
			

		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
