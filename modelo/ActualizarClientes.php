<?php 

     
    class ActualizarClientes {

   public function actualizar ($datos){

    $Id = $datos['id'];
    $CREADO_BY = $datos['creado_by'];

    $creacion= $datos['fecha_creacion'];
    $mes= $datos['mes'];
    $nombres = $datos['nombres'];
    $cedula = $datos['cedula'];
    $direccion = $datos['direccion'];
    $servicio = $datos['servicio'];
    $telefono = $datos['telefono'];
    $pedido = $datos['pedido'];


   
    $conn = new DataBase();
    $pdo = $conn->conexion();

    $query = $pdo->prepare("UPDATE ventas SET  mes=:Mes, nombres=:Nombres, cedula=:Cedula, direccion=:Direccion, servicio=:Servicio, telefono=:Telefono, pedido=:Pedido, fecha_creacion=:Creacion WHERE id=:ID AND creado_by=:Creado_by");
    $query->bindParam(':Mes', $mes);
    $query->bindParam(':Nombres', $nombres);
    $query->bindParam(':Cedula', $cedula);
    $query->bindParam(':Direccion', $direccion);
    $query->bindParam(':Servicio', $servicio);
    $query->bindParam(':Telefono', $telefono);
    $query->bindParam(':Pedido', $pedido);
    $query->bindParam(':Creacion', $creacion);

    $query->bindParam(':ID', $Id);
    $query->bindParam(':Creado_by', $CREADO_BY);

    
    $query->execute();

     if ($query) {
        $_SESSION['updated']='si';
        new Redirect('../vistas/Registros.php'); 


    } else {
      echo 'error al actualizar';
    }

   }
}