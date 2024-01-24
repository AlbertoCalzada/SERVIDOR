package clases;

public class Contact 
{
	String name;
	String tlf;
	int edad;
	public Contact(String name, String tlf, int edad) {
		super();
		this.name = name;
		this.tlf = tlf;
		this.edad = edad;
	}


	
	
	public String getName() {
		return name;
	}
	
	public int getEdad() {
		return edad;
	}
	
	public String getTlf() {
		return tlf;
	}
	
	public String toString() {
		return name + tlf;
	}
}
