package clases;

public class Contact 
{
	String name;
	String tlf;
	
	public Contact(String name, String tlf) 
	{
		this.name=name;
		this.tlf=tlf;
	}
	
	public String getName() {
		return name;
	}
	
	public String getTlf() {
		return tlf;
	}
	
	public String toString() {
		return name + tlf;
	}
}
