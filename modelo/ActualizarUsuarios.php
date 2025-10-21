<?php
  require_once('../controlador/Redirect.php');

  class ActualizarUsuarios {
    
    public function actualizar ($datos){

        $id = $datos['id_asesor'];
        $usuario= $datos['usuario'];
        $clave = $datos['clave'];
        $rol = $datos['rol'];
        var_dump($datos);
       // $claveHased = password_hash($clave, PASSWORD_DEFAULT);

        $conn = new DataBase();
        $pdo = $conn->conexion();
    
        $query = $pdo->prepare("UPDATE usuarios_jc SET usuario=:User, clave=:Clave, rol=:Rol  WHERE id_asesor=:ID ");
        $query->bindParam(':Id_asesor', $id);
        $query->bindParam(':User', $usuario);
        $query->bindParam(':Clave', $clave);
        $query->bindParam(':Rol', $rol);
        $query->bindParam(':ID', $id);
        $query->execute();
          $_SESSION['usuarioActualizado']='';
           new Redirect('../vistas/usuarios.php');

        /*   if ($query) {
         
         echo 'actualizado con exito';


        } else {
          echo 'error al actualizar';
        }  */

        
    }
}