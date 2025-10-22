<?php session_start();
require('../config/DataBase.php');
require('../modelo/CrearClientes.php');
require('../modelo/ActualizarClientes.php');
require_once('Redirect.php');


class MainController
{
  public function CrearClientes($datos)
  {
    
    $NOMBRES = $datos['nombres'];
    $CEDULA = $datos['cedula'];
    $DIRECCION = $datos['direccion'];
    $TELEFONO = $datos['telefono'];
    $SERVICIO = $datos['servicio'];
    
     if (empty($NOMBRES) || empty($CEDULA) || empty($DIRECCION)  || empty($TELEFONO) || empty($SERVICIO) ) {
        
        $_SESSION['Nosaved'] = 'si';
        new Redirect('../vistas/crear.php');   
    
    } else {
         $cre = new CrearClientes();
         $cre->Crear($datos);
     }
  }

  //---------------------------------------------------------------------------------------------

  public function funEdit($data)
  {

    $id = $data;

    $con = new DataBase();
    $pdo = $con->conexion();

    $query = $pdo->prepare("SELECT * FROM ventas_jc WHERE id = :ID");
    $query->execute(['ID' => $id]);
    $resul = $query->fetch();

    if (!empty($resul)) {
      return $resul;
    }
  }

   //---------------------------------------------------------------------------------------------

  public function Actualizar ($datos)
  {
    
    if(empty($datos)){
       new Redirect('../vistas/VistaEditar');

    } else {
      $act = new ActualizarClientes();
      $act->actualizar($datos);
    }
  }

 //---------------------------------------------------------------------------------------------

  public function borrar($datos)
  { 
    $id = $datos;
    $Creado_by = $_SESSION['idasesor'];
    $conn = new DataBase();
    $pdo = $conn->conexion();

    $query = $pdo->prepare("DELETE FROM ventas_jc WHERE  id=:ID  AND creado_by=:CRE");
    $query->bindParam(':ID', $id, PDO::PARAM_INT);
    $query->bindParam(':CRE', $Creado_by, PDO::PARAM_INT);
    $query->execute();
    if ($query->execute()) {
       $_SESSION['borrado'] ='si';
       new Redirect('../vistas/Registros.php');
    } else {
      echo 'error al borrar';
    }
  }

  //---------------------------------------------------------------------------------------------

  public function search ($data){
   
    $cedula = $data['buscar-cedula'];
    $Creado_by = $data['creado_by'];
    
    $con = new DataBase();
    $pdo = $con->conexion();
 
    $query = $pdo->prepare("SELECT * FROM ventas_jc WHERE cedula = :ced AND creado_by = :cre ");
    $query->bindParam(':ced', $cedula, PDO::PARAM_INT);
    $query->bindParam(':cre', $Creado_by, PDO::PARAM_INT);
    $query->execute();
    $obj = $query->fetchAll();
    
    return $obj;
   }



     public function searchPedido ($data){
   
    $pedido = $data['buscar-pedido'];
    $Creado_by = $data['creado_by'];
    
    $con = new DataBase();
    $pdo = $con->conexion();
 
    $query = $pdo->prepare("SELECT * FROM ventas_jc WHERE pedido = :ped AND creado_by = :cre ");
    $query->bindParam(':ped', $pedido, PDO::PARAM_STR_CHAR);
    $query->bindParam(':cre', $Creado_by, PDO::PARAM_INT);
    $query->execute();
    $obj = $query->fetchAll();
    
    return $obj;
   }

}

 //---------------------------------------------------------------------------------------------






 if (isset($_POST['action'])) {
  $Crear = new MainController();
  $Crear->CrearClientes($_POST);
}

if (isset($_POST['actualizar'])) {
  $act = new MainController();
  $act->Actualizar($_POST);
}

if(isset($_POST['buscar'])){
    $instancia = new MainController();
    $instancia->search($_POST);
}

/* if(isset($_POST['buscarPedido'])){
    $instancia = new MainController();
    $instancia->searchPedido($_POST);
}
 */
if (isset($_GET['delete'])) {
  $del = new MainController();
  $del->borrar($_GET['delete']);
}

if(isset($_GET['cerrar'])){
   session_destroy();
  echo "<script> window.location.href='../index.php';</script>";
}
