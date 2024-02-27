package principal;

public class Contact {

	int id;
	String name;
	String tlf;
	int edad;

	public Contact(String name, String tlf, int edad) {
		super();
		this.name = name;
		this.tlf = tlf;
		this.edad = edad;
	}
	
	public Contact(int id,String name, String tlf, int edad) {
		super();
		this.id=id;
		this.name = name;
		this.tlf = tlf;
		this.edad = edad;
	}

	public String getName() {
		return name;
	}

	public Integer getId() {
		return id;
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

	public String toCSV() {
		
		return id + "," + name + "," + tlf + "," + edad + "\n";

		 
	}
}
