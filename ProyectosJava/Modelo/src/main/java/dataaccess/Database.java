package dataaccess;

import java.sql.Connection;

public class Database 
{
	String name;
	String user;
	String password;
	String table;
	Connection conn;
	
	
	public Database(String name, String user, String password, String table, Connection conn) {
		super();
		this.name = name;
		this.user = user;
		this.password = password;
		this.table = table;
		this.conn = conn;
	}
	
	
}
