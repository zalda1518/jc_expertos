<?php
session_start();
require('../modelo/LoginModelo.php');
require_once('../controlador/Redirect.php');


class ingresar
{

    public function Login($datos)
    {   

         $usuario = $datos['usuario'];
         $clave = $datos['clave'];


        if (empty($usuario) || empty($clave)) {
            $mod= new LoginModelo();
            $mod->ingresar($usuario, $clave);
        } else {
             $mod= new LoginModelo();
             $mod->ingresar($usuario, $clave);
            
        }
    }
}


if (isset($_POST['ingresar'])) {
    $act = new ingresar();
    $act->Login($_POST);
}
