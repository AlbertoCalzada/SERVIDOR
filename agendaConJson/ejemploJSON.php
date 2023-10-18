<?php
class Coche
{
  public $matricula;
  public $tipo_motor;
  public function set_matricula($matricula)
  {
    $this->matricula=$matricula;
  }

  public function set_motor($tipo_motor)
  {
    $this->tipo_motor=$tipo_motor;
  }
}

class Motor
{
  public $numero_cilindros;
  public $tipo_combustible;
  public function set_numero_cilindros($numero_cilindros)
  {
    $this->numero_cilindros=$numero_cilindros;
  }
  public function set_tipo_combustible($tipo_combustible)
  {
    $this->tipo_combustible=$tipo_combustible;
  }
}

$c= new Coche();
$motor= new Motor();
$c->matricula="M277123C";
$motor->numero_cilindros=4;
$motor->tipo_combustible="GASOLINA";
$c->set_motor($motor);
//echo "JSON del objeto creado <br>";
$json=json_encode($c);
echo $json;

?>