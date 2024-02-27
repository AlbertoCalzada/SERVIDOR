package clases;

import java.time.LocalDateTime;

public class Entreno 
{
	int id;
	LocalDateTime fecha;
	String ejercicio1;
	String ejercicio2;
	String ejercicio3;
	String ejercicio4;
	String descripcion1;
	String descripcion2;
	String descripcion3;
	String descripcion4;
	
	public Entreno(int id, LocalDateTime fecha, String ejercicio1, String ejercicio2, String ejercicio3,
			String ejercicio4, String descripcion1, String descripcion2, String descripcion3, String descripcion4) {
		super();
		this.id = id;
		this.fecha = fecha;
		this.ejercicio1 = ejercicio1;
		this.ejercicio2 = ejercicio2;
		this.ejercicio3 = ejercicio3;
		this.ejercicio4 = ejercicio4;
		this.descripcion1 = descripcion1;
		this.descripcion2 = descripcion2;
		this.descripcion3 = descripcion3;
		this.descripcion4 = descripcion4;
	}
	
	public Entreno(String ejercicio1, String ejercicio2, String ejercicio3,
			String ejercicio4, String descripcion1, String descripcion2, String descripcion3, String descripcion4) {
		super();
		
		
		this.ejercicio1 = ejercicio1;
		this.ejercicio2 = ejercicio2;
		this.ejercicio3 = ejercicio3;
		this.ejercicio4 = ejercicio4;
		this.descripcion1 = descripcion1;
		this.descripcion2 = descripcion2;
		this.descripcion3 = descripcion3;
		this.descripcion4 = descripcion4;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public LocalDateTime getFecha() {
		return fecha;
	}
	public void setFecha(LocalDateTime fecha) {
		this.fecha = fecha;
	}
	public String getEjercicio1() {
		return ejercicio1;
	}
	public void setEjercicio1(String ejercicio1) {
		this.ejercicio1 = ejercicio1;
	}
	public String getEjercicio2() {
		return ejercicio2;
	}
	public void setEjercicio2(String ejercicio2) {
		this.ejercicio2 = ejercicio2;
	}
	public String getEjercicio3() {
		return ejercicio3;
	}
	public void setEjercicio3(String ejercicio3) {
		this.ejercicio3 = ejercicio3;
	}
	public String getEjercicio4() {
		return ejercicio4;
	}
	public void setEjercicio4(String ejercicio4) {
		this.ejercicio4 = ejercicio4;
	}
	public String getDescripcion1() {
		return descripcion1;
	}
	public void setDescripcion1(String descripcion1) {
		this.descripcion1 = descripcion1;
	}
	public String getDescripcion2() {
		return descripcion2;
	}
	public void setDescripcion2(String descripcion2) {
		this.descripcion2 = descripcion2;
	}
	public String getDescripcion3() {
		return descripcion3;
	}
	public void setDescripcion3(String descripcion3) {
		this.descripcion3 = descripcion3;
	}
	public String getDescripcion4() {
		return descripcion4;
	}
	public void setDescripcion4(String descripcion4) {
		this.descripcion4 = descripcion4;
	}
	
	public String toCSV() 
	{
		return fecha + "," + ejercicio1 + "," + descripcion1 + "," + ejercicio2 + ","+descripcion2+","+ejercicio3 + ","+descripcion3 +","+ejercicio4 + ","+descripcion4+"\n";
	}
	
}
