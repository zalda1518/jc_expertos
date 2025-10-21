<?php
 require_once('../controlador/Redirect.php');

  class CrearUser {
    
    public function Crear ($datos){
   
        
        $user = $datos['usuario'];
        $clave = $datos['clave'];
        $rol = $datos['rol'];

        $passEncripted = password_hash($clave,PASSWORD_DEFAULT);

        $conn = new DataBase();
        $pdo = $conn->conexion();
  
  
        $query = $pdo->prepare("INSERT INTO usuarios (usuario, clave, rol) VALUES (:User, :Pass, :Rol)");
        $query->bindParam(':User', $user, PDO::PARAM_STR_CHAR);
        $query->bindParam(':Pass', $clave, PDO::PARAM_STR_CHAR);
        $query->bindParam(':Rol', $rol, PDO::PARAM_STR_CHAR);
        $query->execute();
    
        if ($query) {
          $_SESSION['usuarioCreado']='';
          new Redirect('../vistas/usuarios.php');
          } else {
          $_SESSION['usuarioNoCreado']='';
           new Redirect('../vistas/usuarios.php');
          }

  }
}

    /*  require_once('controlador/Redirect.php');
      new Redirect('../tigo-ventas-roles/vistas/crear.php');
      ///777777-----------------------
      if(isset($_SESSION['nostart'])) { 
        $alert = new Alertas();
        $alert->usuarioIncorrecto();
        session_unset();
         }  
        */