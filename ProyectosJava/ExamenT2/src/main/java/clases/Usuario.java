package clases;

public class Usuario 
{
	int id;
	String user;
	String pass;
	int rol;
	
	public Usuario(int id, String user, String pass,int rol) {
		super();
		this.id = id;
		this.user = user;
		this.pass = pass;
		this.rol = rol;
	}
	
	public Usuario(String user, String pass, int rol) {
		super();
		
		this.user = user;
		this.pass = pass;
		this.rol = rol;
	}

	public int getId() {
		return id;
	}

	
	public int getRol() {
		return rol;
	}

	public void setRol(int rol) {
		this.rol = rol;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	public String getPass() {
		return pass;
	}

	public void setPass(String pass) {
		this.pass = pass;
	}
	
	
	
}
