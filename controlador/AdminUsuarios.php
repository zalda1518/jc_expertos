<?php 
session_start();
require('../config/DataBase.php');
require('../modelo/CrearUser.php');
require('../modelo/ActualizarUsuarios.php');
require_once('../controlador/Redirect.php');
require('../includes/alertas.php');



class AdminUsuarios {

      public function Crear ($datos) {
         
      
        $user = $datos['usuario'];
        $clave = $datos['clave'];
        $rol = $datos['rol'];

     if(empty($user) || empty($clave)  || empty($rol)){
         $_SESSION['usuarioNoCreado']='';
         new Redirect('../vistas/usuarios.php');
        } 
     else {
       $cre = new CrearUser();
       $cre->Crear($datos);
      
    }
  }

  //-------------------------------------------------------------------------------

  public function funEdit($data)
  {

    $id = $data;

    $con = new DataBase();
    $pdo = $con->conexion();

    $query = $pdo->prepare("SELECT * FROM usuarios_jc WHERE id_asesor = :ID");
    $query->execute([':ID' => $id]);
    $resul = $query->fetch();

    if (!empty($resul)) {
      return $resul;
    }
  }

  //-------------------------------------------------------------------------------

  public function act ($datos)
  {
    $id = $datos['id_asesor'];
    $usuario= $datos['usuario'];
    $clave = $datos['clave'];
    $rol = $datos['rol'];
    
    if(empty($datos)){
     
      echo "<script>alert('verifique todos los datos');
            window.location.href='../vistas/vistaEditarAsesores.php';
           </script>";
    } else {
      /* $act = new ActualizarUsuarios();
        $act->actualizar($datos); */
        $id = $datos['id_asesor'];
        $usuario= $datos['usuario'];
        $clave = $datos['clave'];
        $rol = $datos['rol'];
       // $claveHased = password_hash($clave, PASSWORD_DEFAULT);

        $conn = new DataBase();
        $pdo = $conn->conexion();
    
        $query = $pdo->prepare("UPDATE usuarios_jc SET usuario=:User, clave=:Clave, rol=:Rol  WHERE id_asesor=:ID ");
        $query->bindParam(':User', $usuario);
        $query->bindParam(':Clave', $clave);
        $query->bindParam(':Rol', $rol);
        $query->bindParam(':ID', $id);
        $query->execute();
       
       if($query->execute()){
          $_SESSION['usuarioActualizado']='';
        new Redirect('../vistas/usuarios.php');
       }
       

    
 

    }
  }

//-------------------------------------------------------------------------------

  public function borrar($datos)
  {
    $id = $datos['delete'];
    
    $conn = new DataBase();
    $pdo = $conn->conexion();

    $query = $pdo->prepare("DELETE FROM usuarios_jc WHERE id_asesor=:ID");
    $query->bindParam(':ID', $id);
    $query->execute();

    if ($query->execute()) {
         $_SESSION['usuarioBorrado']='';
         new Redirect('../vistas/usuarios.php');
    } else {
      echo 'error al borrar';
    }
  }

  public function CrearUsuarios ($datos) {
         
      
    $user = $datos['usuario'];
    $clave = $datos['clave'];
    $rol = $datos['rol'];
  
  if(empty($user) || empty($clave)  || empty($rol)){
  echo"<script>alert('todos los campos son requeridos');
     window.location.href='../vistas/admin.php'</script>";
    } 
  else {
   $cre = new CrearUser();
   $cre->Crear($datos);
  
  }
 }


}



//-------------------------------------------------------------------------------


// los que inician las funciones de las clases

if(isset($_POST['cerrar'])){
   session_destroy();
  echo "<script> window.location.href='../index.php';</script>";
}

if(isset($_GET['delete'])){
  $del = new AdminUsuarios();
  $del->borrar($_GET);
}

if(isset($_POST['crear-usuarios'])){
   $cre = new AdminUsuarios();
   $cre->Crear($_POST);
}

if(isset($_POST['actualizar-usuarios'])){
  $cre = new AdminUsuarios();
  $cre->act($_POST);
}