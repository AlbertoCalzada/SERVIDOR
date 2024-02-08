import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import com.mysql.cj.jdbc.Driver;
import com.mysql.cj.xdevapi.Result;

public class ClassPrincipal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		try {
			Connection c = DriverManager.getConnection("jdbc:mysql://localhost:3306/bd_alumnos", "root", "");
			Statement stmt = c.createStatement();
			// insertar
			// String sql = "INSERT INTO `t_alumnos`( `nombre`, `telefono`) VALUES
			// ('Felipe','674957981')";
			// stmt.executeUpdate(sql);
			String sql = "SELECT * FROM `t_alumnos`";
			ResultSet resultados = stmt.executeQuery(sql);

			while (resultados.next()) {
				int id = resultados.getInt("id");
				String nombre = resultados.getString("nombre");
				String telefono = resultados.getString("telefono");

				System.out.println(id + " " + nombre + " " + telefono);
			}
			stmt.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
