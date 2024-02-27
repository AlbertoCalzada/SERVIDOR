package principal;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;



public class Metodos

{
	private static Connection conn = null;
    private static PreparedStatement pstmt = null;

    private static void abrirConexion() throws ClassNotFoundException, SQLException {
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/dependenciasagenda", "root", "");
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

    public static void Escribir(Contact c) throws ClassNotFoundException, SQLException {
        abrirConexion();
        String sql = "INSERT INTO t_contactos(name, tlf, edad) VALUES (?, ?, ?)";
        pstmt = conn.prepareStatement(sql);
        pstmt.setString(1, c.getName());
        pstmt.setString(2, c.getTlf());
        pstmt.setInt(3, c.getEdad());
        pstmt.executeUpdate();
        cerrarConexion();
    }
	

    public static ArrayList<Contact> LeerSql() throws ClassNotFoundException, SQLException {
        ArrayList<Contact> lista_contactos = new ArrayList<Contact>();
        abrirConexion();
        String sql = "SELECT * FROM t_contactos";

        pstmt = conn.prepareStatement(sql);
        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
            int id = rs.getInt("id");
            int edad = rs.getInt("edad");
            String name = rs.getString("name");
            String tlf = rs.getString("tlf");

            Contact n = new Contact(id, name, tlf, edad);

            lista_contactos.add(n);
        }
        cerrarConexion();
        return lista_contactos;
    }
    
    public static ArrayList<Contact> buscarPorNombre(String nombre) throws ClassNotFoundException, SQLException {
        ArrayList<Contact> lista_contactos = new ArrayList<Contact>();
        abrirConexion();
        String sql = "SELECT * FROM t_contactos WHERE name = ?"; 
        
        pstmt = conn.prepareStatement(sql);
        
        pstmt.setString(1, nombre);
        
        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
            int id = rs.getInt("id");
            int edad = rs.getInt("edad");
            String name = rs.getString("name");
            String tlf = rs.getString("tlf");

            Contact n = new Contact(id, name, tlf, edad);
            lista_contactos.add(n);
        }
        cerrarConexion();
        return lista_contactos;
    }
    
    public static void borrarContactoBD(String tlf) throws ClassNotFoundException, SQLException {
        abrirConexion();
        String sql = "DELETE FROM t_contactos WHERE tlf = ?";
        pstmt = conn.prepareStatement(sql);
        pstmt.setString(1, tlf);
        pstmt.executeUpdate();
        cerrarConexion();
    }
    
	public static void exportarCSV() throws ClassNotFoundException, SQLException, IOException {
		// TODO Auto-generated method stub

		ArrayList<Contact> lista = LeerSql();

		File archivo = new File("C:\\xampp\\htdocs\\servidor\\ProyectosJava\\DependenciasAgenda\\palabras.csv");
		FileWriter fw = new FileWriter(archivo);

		for (int i = 0; i < lista.size(); i++) {
			fw.write(lista.get(i).toCSV());
		}
		if (fw != null) {
			fw.close();
		}
	}

	public static void crearCSV(Contact c) throws IOException {
		File archivo = new File("C:\\xampp\\htdocs\\servidor\\ProyectosJava\\DependenciasAgenda\\palabras.csv");
		FileWriter fw = new FileWriter(archivo, true);
		fw.write(c.getName() + "," + c.getTlf() + "," + c.getEdad() + "\n");
		System.out.println("Contacto guardado con éxito");
		if (fw != null) {
			fw.close();
		}
	}
	
	public static void borrarContactoCSV(String tlf) throws IOException, ClassNotFoundException, SQLException {
	    ArrayList<Contact> lista = LeerSql(); // Obtener la lista de contactos desde la base de datos
	    try {
	        String ruta = "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\DependenciasAgenda\\palabras.csv";
	        FileWriter fw = new FileWriter(ruta, false);
	        fw.write(""); // Borrar el contenido del archivo CSV
	        fw.close();

	        fw = new FileWriter(ruta, true);

	        for (int i = 0; i < lista.size(); i++) {
	            if (!lista.get(i).getTlf().equals(tlf)) {
	                Contact c = new Contact(lista.get(i).getName(), lista.get(i).getTlf(), lista.get(i).getEdad());
	                crearCSV(c); // Escribir en el archivo CSV el contacto que no se va a borrar
	            }
	        }

	        fw.close();

	    } catch (Exception e) {
	        e.printStackTrace();
	    }
	}
	
	
}
