package clases;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class Metodos

{

	/*
	 * public static void Escribir(Contact c)
	 * 
	 * {
	 * 
	 * try { String ruta=
	 * "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
	 * FileWriter fw = new FileWriter(ruta, true); // true para que no se
	 * sobreescriba
	 * 
	 * fw.write(c.getName()+ ","+ c.getTlf()+"," +c.getEdad()+ "\n");
	 * 
	 * System.out.println("Contacto guardado con éxito"); fw.close();
	 * 
	 * } catch (Exception e) { e.getStackTrace(); }
	 * 
	 * }
	 */

	public static void Escribir(Contact contacto)

	{

		try {

			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection c;
			c = DriverManager.getConnection("jdbc:mysql://localhost:3306/agendaJava", "root", "");
			Statement stmt = c.createStatement();
			String name = contacto.getName();
			int edad = contacto.getEdad();
			String telefono = contacto.getTlf();
			String sql = "INSERT INTO `contactos`(`nombre`, `telefono`, `edad`) VALUES ('" + name + "','" + telefono
					+ "','" + edad + "')";
			stmt.executeUpdate(sql);
			stmt.close();
		} catch (SQLException | ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public static ArrayList<Contact> LeerSql() {
		
		ResultSet result = null;
		ArrayList<Contact> list = new ArrayList<Contact>();
		try {

			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection c;
			c = DriverManager.getConnection("jdbc:mysql://localhost:3306/agendaJava", "root", "");
			Statement stmt = c.createStatement();
			String sql = "SELECT * FROM `contactos`";
			result = stmt.executeQuery(sql);
			result.next();
			
			while(result.getRow()!=0) 
			{
				System.out.println(result.getObject(1));
				
				Contact contact = new Contact(result.getObject(2).toString(), result.getObject(3).toString(), Integer.parseInt(result.getObject(4).toString()));
				list.add(contact);
				result.next();
				
			}
			
			stmt.close();
			return list;  
		} catch (SQLException | ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return list;
	}

	public static ArrayList<Contact> Leer()

	{
		String ruta = "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
		ArrayList<Contact> list = new ArrayList<Contact>();
		try {
			FileReader fr = new FileReader(ruta);
			BufferedReader br = new BufferedReader(fr);

			String line = br.readLine();
			while (line != null) {
				String data[] = line.split(",");

				Contact c = new Contact(data[0], data[1], Integer.parseInt(data[2]));
				list.add(c);
				line = br.readLine(); // sigo leyendo

			}

			br.close();
			fr.close();
		} catch (Exception e) { // TODO: handle exception
			e.printStackTrace();
		}

		return list;
	}

	public static ArrayList<Contact> Buscar(String name) {
		ArrayList<Contact> list = new ArrayList<Contact>();
		ArrayList<Contact> listBuscados = new ArrayList<Contact>();
		list = LeerSql();

		for (int i = 0; i < list.size(); i++) {
			if (list.get(i).getName().equals(name)) {
				Contact c = new Contact(list.get(i).getName(), list.get(i).getTlf(), list.get(i).getEdad());
				listBuscados.add(c);
			}
		}
		return listBuscados;
	}

	public static ArrayList<Contact> Borrar(String tlf) {

		ArrayList<Contact> list = new ArrayList<Contact>();
		// ArrayList<Contact> list2 = new ArrayList<Contact>();
		list = LeerSql();
		try {
			

			for (int i = 0; i < list.size(); i++) {
				if (list.get(i).getTlf().equals(tlf)) {
					
					Class.forName("com.mysql.cj.jdbc.Driver");
					Connection c;
					c = DriverManager.getConnection("jdbc:mysql://localhost:3306/agendaJava", "root", "");
					Statement stmt = c.createStatement();
					String sql = "DELETE FROM `contactos` WHERE `telefono` = '" + tlf + "';";
					stmt.executeUpdate(sql);
					stmt.close();
				}
			}
			

		} catch (Exception e) {
			
			e.getStackTrace();
		}
		return list;
	}

}
