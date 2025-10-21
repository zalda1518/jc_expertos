<?php
class DataBase
{
  private $host = 'centerbeam.proxy.rlwy.net'; // ⚠️ cambia por el tuyo exacto
  private $usuario = 'root';
  private $clave = 'aeSQNfzAEzQZaskIJNRJvkWzlOwrbmpJ'; // ⚠️ tu contraseña
  private $basedatos = 'railway';
  private $port = 52524; // ⚠️ este puerto debe coincidir

  public function conexion()
  {
    try {
      $pdo = new PDO(
        "mysql:host=$this->host;dbname=$this->basedatos;port=$this->port;charset=utf8mb4",
        $this->usuario,
        $this->clave
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $error) {
      die("❌ Error de conexión: " . $error->getMessage());
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