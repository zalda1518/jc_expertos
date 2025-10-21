<?php 
require_once('../controlador/Redirect.php');


class CrearClientes {

    public function Crear($datos){
 
        $MES = $datos['mes'];
        $NOMBRES = $datos['nombres'];
        $CEDULA = $datos['cedula'];
        $DIRECCION = $datos['direccion'];
        $SERVICIO = $datos['servicio'];
        $TELEFONO = $datos['telefono'];
        $PEDIDO = random_int(1000,9999);
        $CREADO_BY = $datos['creado_by'];
        $FECHA_CREACION =  date('Y-m-d');



        $conn = new DataBase();
        $pdo = $conn->conexion();
  

      $query = $pdo->prepare("INSERT INTO ventas_jc (mes,nombres,cedula,direccion,telefono,pedido,creado_by,servicio,fecha_creacion) VALUES (:mes,:nombres,:cedula,:direccion,:telefono,:pedido,:creado_by,:servicio,:fecha_creacion)");
      $query->bindParam(':mes', $MES, PDO::PARAM_STR_CHAR);
      $query->bindParam(':nombres', $NOMBRES,PDO::PARAM_STR_CHAR);
      $query->bindParam(':cedula', $CEDULA,PDO::PARAM_INT);
      $query->bindParam(':direccion', $DIRECCION,PDO::PARAM_STR_CHAR);
      $query->bindParam(':telefono', $TELEFONO,PDO::PARAM_INT);
      $query->bindParam(':pedido', $PEDIDO,PDO::PARAM_STR_CHAR);
      $query->bindParam(':servicio', $SERVICIO,PDO::PARAM_STR_CHAR);
      $query->bindParam(':creado_by', $CREADO_BY,PDO::PARAM_INT);
      $query->bindParam(':fecha_creacion', $FECHA_CREACION,PDO::PARAM_STR_CHAR);

      $query->execute();

      if ($query) {
         $_SESSION['saved'] = 'si';
         new Redirect('../vistas/crear.php');
      } else {
        $_SESSION['Nosaved'] = 'no';
           new Redirect('../vistas/crear.php');
      }
    }

}