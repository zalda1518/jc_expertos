<?php
require('../config/DataBase.php');
require_once('../controlador/Redirect.php');


class LoginModelo
{

    public function ingresar($usuario, $clave)
    {
       
        if(empty($usuario) || empty($clave)){
           $_SESSION['vacios'] = 'si';
           new Redirect('../index.php');
           die;
            }
        

        $conn = new DataBase();
        $pdo = $conn->conexion();

        $query = $pdo->prepare("SELECT *  FROM usuarios_jc WHERE usuario = :user AND clave = :pass ");
        $query->bindParam(':user', $usuario, PDO::PARAM_STR);
        $query->bindParam(':pass', $clave, PDO::PARAM_STR);
        $query->execute();
        $arr = $query->fetch(PDO::FETCH_ASSOC);

        if($arr){
            
                $ID_ASESOR = $arr['id_asesor'];
                $USUARIO = $arr['usuario'];
                $ID_ROL = $arr['rol'];

                $_SESSION['idasesor'] = $ID_ASESOR;
                $_SESSION['usuario'] = $USUARIO;
                $_SESSION['rol'] = $ID_ROL;
                 
                $_SESSION['start'] = $USUARIO;
                new Redirect('../vistas/crear.php');


            } else {
              $_SESSION['nostart'] = 'Usuario o Contraseña Incorrectos';
              new Redirect('../index.php');
            }
 /*          contraseña haseada
            if(password_verify($clave, $arr['clave'])){
            
                $ID_ASESOR = $arr['id_asesor'];
                $USUARIO = $arr['usuario'];
                $CLAVE = $arr['clave'];
                $ID_ROL = $arr['rol'];

                $_SESSION['idasesor'] = $ID_ASESOR;
                $_SESSION['usuario'] = $USUARIO;
                $_SESSION['clave'] = $CLAVE;
                $_SESSION['rol'] = $ID_ROL;
                 
                $_SESSION['start'] = $USUARIO;
                new Redirect('../vistas/crear.php');


            } else {
              $_SESSION['nostart'] = 'Usuario o Contraseña Incorrectos';
              new Redirect('../index.php');
            }  */
    }
}

