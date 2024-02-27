package clases;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDateTime;
import java.util.ArrayList;

import principal.Contact;

public class AccesoDatos {
	private static Connection conn = null;
	private static PreparedStatement pstmt = null;
	LocalDateTime l = LocalDateTime.now();
	int dia = l.getDayOfMonth();
	int mes = l.getMonthValue();
	int anyo = l.getYear();
	String fecha = dia + "/" + mes + "/" + anyo;

	private static void abrirConexion() throws ClassNotFoundException, SQLException {
		Class.forName("com.mysql.cj.jdbc.Driver");
		conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/gimnasio", "root", "");
	}

	private static void cerrarConexion() {
		try {
			if (pstmt != null) {
				pstmt.close();
			}
			if (conn != null) {
				conn.close();
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public static void registrarUsuario(Usuario u) throws ClassNotFoundException, SQLException {
		abrirConexion();
		String sql = "INSERT INTO t_usuarios(user, pass,rol) VALUES (?, ?,?)";
		pstmt = conn.prepareStatement(sql);
		pstmt.setString(1, u.getUser());
		pstmt.setString(2, u.getPass());
		pstmt.setInt(3, u.getRol());
		pstmt.executeUpdate();
		cerrarConexion();

	}

	public static void registrarEntreno(Entreno entreno) throws ClassNotFoundException, SQLException {
		abrirConexion();
		String sql = "INSERT INTO `t_entrenos`(`ejercicio1`, `ejercicio2`, `ejercicio3`, `ejercicio4`, `descripcion1`, `descripcion2`, `descripcion3`, `descripcion4`) VALUES (?,?,?,?,?,?,?,?)";
		pstmt = conn.prepareStatement(sql);

		pstmt.setString(1, entreno.getEjercicio1());
		pstmt.setString(2, entreno.getEjercicio2());
		pstmt.setString(3, entreno.getEjercicio3());
		pstmt.setString(4, entreno.getEjercicio4());
		pstmt.setString(5, entreno.getDescripcion1());
		pstmt.setString(6, entreno.getDescripcion2());
		pstmt.setString(7, entreno.getDescripcion3());
		pstmt.setString(8, entreno.getDescripcion4());

		pstmt.executeUpdate();
		cerrarConexion();

	}

	public static ArrayList<Usuario> MostrarUsuarios() throws ClassNotFoundException, SQLException {
		ArrayList<Usuario> lista_usuarios = new ArrayList<Usuario>();
		abrirConexion();
		String sql = "SELECT * FROM t_usuarios";

		pstmt = conn.prepareStatement(sql);
		ResultSet rs = pstmt.executeQuery();

		while (rs.next()) {
			int id = rs.getInt("id");
			int rol = rs.getInt("rol");
			String user = rs.getString("user");
			String pass = rs.getString("pass");

			Usuario n = new Usuario(id, user, pass, rol);

			lista_usuarios.add(n);
		}
		cerrarConexion();
		return lista_usuarios;
	}

	public static ArrayList<Ejercicio> MostrarEjercicios() throws ClassNotFoundException, SQLException {
		ArrayList<Ejercicio> lista_ejercicios = new ArrayList<Ejercicio>();
		abrirConexion();
		String sql = "SELECT * FROM t_ejercicios";

		pstmt = conn.prepareStatement(sql);
		ResultSet rs = pstmt.executeQuery();

		while (rs.next()) {
			int id = rs.getInt("id");

			String nombre = rs.getString("nombre");

			Ejercicio n = new Ejercicio(id, nombre);

			lista_ejercicios.add(n);
		}
		cerrarConexion();
		return lista_ejercicios;
	}

	public static ArrayList<Entreno> MostrarEntrenamientos() throws ClassNotFoundException, SQLException {
		ArrayList<Entreno> lista_ejercicios = new ArrayList<Entreno>();
		abrirConexion();
		String sql = "SELECT * FROM t_entrenos";

		pstmt = conn.prepareStatement(sql);
		ResultSet rs = pstmt.executeQuery();

		while (rs.next()) {
			int id = rs.getInt("id");

			String nombre1 = rs.getString("ejercicio1");
			String nombre2 = rs.getString("ejercicio2");
			String nombre3 = rs.getString("ejercicio3");
			String nombre4 = rs.getString("ejercicio4");
			String nombre5 = rs.getString("ejercicio5");
			String nombre6 = rs.getString("ejercicio6");
			String nombre7 = rs.getString("ejercicio7");
			String nombre8 = rs.getString("ejercicio7");

			Entreno n = new Entreno(nombre1, nombre2, nombre3, nombre4, nombre5, nombre6, nombre7, nombre8);

			lista_ejercicios.add(n);
		}
		cerrarConexion();
		return lista_ejercicios;
	}

	public static ArrayList<Usuario> buscarPorNombre(String nombre, String password)
			throws ClassNotFoundException, SQLException {
		ArrayList<Usuario> lista_usuarios = new ArrayList<Usuario>();
		abrirConexion();
		String sql = "SELECT * FROM t_usuarios WHERE user = ? and pass = ?";

		pstmt = conn.prepareStatement(sql);

		pstmt.setString(1, nombre);
		pstmt.setString(2, password);

		ResultSet rs = pstmt.executeQuery();

		while (rs.next()) {

			String user = rs.getString("user");
			String pass = rs.getString("pass");
			int rol = rs.getInt("rol");

			Usuario n = new Usuario(user, pass, rol);
			lista_usuarios.add(n);
		}
		cerrarConexion();
		return lista_usuarios;
	}

	public static void exportarCSV() throws ClassNotFoundException, SQLException, IOException { // TODO Auto-generated
																								// method stub

		ArrayList<Entreno> lista = MostrarEntrenamientos();

		File archivo = new File("C:\\xampp\\htdocs\\servidor\\ProyectosJava\\ExamenT2\\datos.csv");
		FileWriter fw = new FileWriter(archivo);

		for (int i = 0; i < lista.size(); i++) {
			fw.write(lista.get(i).toCSV());
		}
		if (fw != null) {
			fw.close();
		}

	}

}
