package clases;

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
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		try {
			String accion= request.getParameter("accion");
			ArrayList<Usuario> lista_usuarios= new ArrayList<Usuario>();
			ArrayList<Ejercicio> lista_ejercicio= new ArrayList<Ejercicio>();
			ArrayList<Entreno> lista_entreno= new ArrayList<Entreno>();
			if(accion==null) 
			{
				
			}else if(accion.equals("iniciarSesion")) 
			{
				String user=request.getParameter("user");
				String pass=request.getParameter("pass");
				
				lista_usuarios=AccesoDatos.buscarPorNombre(user, pass);
				
				if (lista_usuarios == null || lista_usuarios.isEmpty()) 
				{
					request.getRequestDispatcher("index.jsp").forward(request, response);
					
				}else {
					request.setAttribute("listaUsuario", lista_usuarios);
					request.getRequestDispatcher("Servlet?accion=registrarEjercicios").forward(request, response);
				}
			
				
				
			}else if(accion.equals("registro")) 
			
			{
				String user=request.getParameter("user");
				String pass=request.getParameter("pass");
				
				Usuario u= new Usuario(user, pass, 0);
				AccesoDatos.registrarUsuario(u);
				request.getRequestDispatcher("index.jsp").forward(request, response);
				
			}else if(accion.equals("registrarEjercicios")) 
			{
				
				lista_ejercicio=AccesoDatos.MostrarEjercicios();
				request.setAttribute("listaEjercicio", lista_ejercicio);
				request.getRequestDispatcher("registrarEjercicios.jsp").forward(request, response);
			}else if(accion.equals("insertarAnotaciones")) 
			
			{
				String ejercicio1=request.getParameter("ejercicio_0");
				String ejercicio2=request.getParameter("ejercicio_1");
				String ejercicio3=request.getParameter("ejercicio_2");
				String ejercicio4=request.getParameter("ejercicio_3");
				
				String anotacion1=request.getParameter("anotacion_0");
				String anotacion2=request.getParameter("anotacion_1");
				String anotacion3=request.getParameter("anotacion_2");
				String anotacion4=request.getParameter("anotacion_3");
				
				
				Entreno entreno= new Entreno(ejercicio1, ejercicio2, ejercicio3, ejercicio4, accion, accion, accion, accion);
				
				AccesoDatos.registrarEntreno(entreno);
			}else if(accion.equals("verEntrenos")) 
			{
				lista_entreno=AccesoDatos.MostrarEntrenamientos();
				
				request.setAttribute("listaEntreno", lista_ejercicio);
				request.getRequestDispatcher("verEntrenos.jsp").forward(request, response);
				
			}
			
			
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
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
