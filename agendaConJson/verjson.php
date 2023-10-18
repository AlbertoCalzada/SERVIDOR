<?php




class Contacto
{
    public $name;
    public $surname;
    public $tel;

    public function __construct($name, $surname, $tel)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->tel = $tel;
    }
}

class Agenda
{
    public $contacto = array();

    public function set_contacto($contacto)
    {
        $this->contacto[] = $contacto;
    }
}


$agenda = new Agenda();


/*while (!feof($myfile)) {
    $frase = fgets($myfile);
    $arrayFrase = explode(",", $frase);
    if ($arrayFrase >= 3 ) 
    {
        $contacto = new Contacto();
        $nombre = $arrayFrase[0];
        $apellido = $arrayFrase[1];
        $tlf = $arrayFrase[2];
        $contacto->set_nombre($nombre);
        $contacto->set_apellido($apellido);
        $contacto->set_telefono($tlf);
        $agenda->set_contacto($contacto);
    }

   
}

fclose($myfile);*/



$fp = fopen("listacontactos.csv", "r");
if ($fp != FALSE) {
    while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
        $contacto[] = new Contacto($data[0], $data[1], $data[2]);
    }
    fclose($fp);
}

$json = json_encode($contacto);
echo $json;
