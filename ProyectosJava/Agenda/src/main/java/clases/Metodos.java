package clases;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.util.ArrayList;

public class Metodos

{

	

	public static void Escribir(Contact c)

	{
		
		try {
			String ruta= "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
			FileWriter fw = new FileWriter(ruta, true); // true para que no se  sobreescriba

			fw.write(c.getName()+ ","+ c.getTlf()+"," +c.getEdad()+ "\n");
			
			System.out.println("Contacto guardado con éxito"); 
			fw.close();

		} catch (Exception e) {
			e.getStackTrace(); 
		}

	}
	


	public static ArrayList<Contact> Leer()

	{
		String ruta= "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
		ArrayList<Contact> list = new ArrayList<Contact>();
		try {
			FileReader fr = new FileReader(ruta);
			BufferedReader br = new BufferedReader(fr);
			
			
			String line=br.readLine();
			while(line  != null) 
			{
				String data[]= line.split(",");
				
				Contact c = new Contact(data[0],data[1],Integer.parseInt(data[2]));
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
	
	public static ArrayList<Contact> Buscar(String name) 
	{
		ArrayList<Contact> list = new ArrayList<Contact>();
		ArrayList<Contact> listBuscados = new ArrayList<Contact>();
		list=Leer();
		
		
		for (int i = 0; i < list.size(); i++) 
		{
			if(list.get(i).getName().equals(name)) 
			{
				Contact c= new Contact(list.get(i).getName(),list.get(i).getTlf(),list.get(i).getEdad());
				listBuscados.add(c);
			}
		}
		return listBuscados;
	}
	
	public static ArrayList<Contact> Borrar(String tlf)
	{
		
		ArrayList<Contact> list = new ArrayList<Contact>();
		//ArrayList<Contact> list2 = new ArrayList<Contact>();
		list=Leer();
		try {
			String ruta= "C:\\xampp\\htdocs\\servidor\\ProyectosJava\\Agenda\\Agenda.contactos.csv";
			FileWriter fw = new FileWriter(ruta, false); 
			fw.write("");
			fw.close();
			fw = new FileWriter(ruta, true); 

			
			for (int i = 0; i < list.size(); i++) 
			{
				if(!list.get(i).getTlf().equals(tlf)) 
				{
					Contact c= new Contact(list.get(i).getName(),list.get(i).getTlf(),list.get(i).getEdad());
				
					Escribir(c);
							
				}
			}
			
			
			fw.close();

		} catch (Exception e) {
			e.getStackTrace(); 
		}
		return list;
	}

}

