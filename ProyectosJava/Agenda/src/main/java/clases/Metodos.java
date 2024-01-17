package clases;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.util.ArrayList;

public class Metodos

{

	public static void Escribir(String ruta, Contact c)

	{
		try {
			FileWriter fw = new FileWriter(ruta, true); // true para no se se sobreescriba

			fw.write(c.getName()+ ","+ c.getTlf() + "\n");
			
			System.out.println("Contacto guardado con éxito"); 
			fw.close();

		} catch (Exception e) {
			e.getStackTrace(); 
		}

	}

	public static ArrayList<Contact> Leer(String ruta)

	{
		ArrayList<Contact> list = new ArrayList<Contact>();
		try {
			FileReader fr = new FileReader(ruta);
			BufferedReader br = new BufferedReader(fr);
			
			
			String line=br.readLine();
			while(line  != null) 
			{
				String data[]= line.split(",");
				Contact c = new Contact(data[0],data[1]);
				list.add(c);
				line=br.readLine(); //sigo leyendo
				
			}
			
				
			br.close();
			fr.close();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		
		return list;
	}

}

