
<?php

class DataBase
{
  private $host = 'mysql.railway.internal';
  private $usuario = 'root';
  private $clave = 'aeSQNfzAEzQZaskIJNRJvkWzlOwrbmpJ';
  private $basedatos = 'railway';
  private $port = 3306;

  public function conexion(){
    try{
      $pdo = new PDO ("mysql:host=".$this->host.";dbname=".$this->basedatos,$this->usuario,$this->clave);
      return $pdo;
    }
    catch(PDOException $error){
      echo $error->getMessage();
    }
  }
}

/* class DataBase
{
  private $host = 'localhost';
  private $usuario = 'root';
  private $clave = '';
  private $basedatos = 'jc_clientes';
  private $port = 27984;

  public function conexion(){
    try{
      $pdo = new PDO ("mysql:host=".$this->host.";dbname=".$this->basedatos,$this->usuario,$this->clave);
      return $pdo;
    }
    catch(PDOException $error){
      echo $error->getMessage();
    }
  }
} */



/*
$conexion = mysqli_connect($host, $usuario, $clave, $basedatos);

if ($conexion->connect_error) {
  echo 'error de conexion a la base de datos';
  exit();
}

?>
*/