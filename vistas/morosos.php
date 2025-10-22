<?php 
session_start();
require('header.php');
require_once('../includes/alertas.php');

if (!isset($_SESSION['start'])) {
  return new Redirect('./vistas/index.php');
} 

if (isset($_SESSION['updated'])) { 
    $alert = new Alertas();
    $alert->Actualizado();
   unset($_SESSION['updated']); } 

if (isset($_SESSION['borrado'])) { 
    $alert = new Alertas();
    $alert->Eliminado();
   unset($_SESSION['borrado']); } ?> 

 <div id="main-registros">
   <div class="padre-menu-desktop">
          <?php require('menuDesktop.php') ?>
  </div>
   <div class="padre-hamburguesa"> 
          <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
   </div>

   <?php  require('menuResponsive.php'); ?>

   <table>
    <thead>
      
      <th class='columnas'>FECHA PAGO</th>
      <th class='columnas'>MES</th>
      <th class='columnas'>NOMBRES</th>
      <th class='columnas'>CEDULA</th>
      <th class='columnas'>DIRECCION</th>
      <th class='columnas'>PLAN</th>
      <th class='columnas'>TELEFONO</th>
      <th class='columnas'>PEDIDO</th>
      <th class='columnas'>EDITAR</th>
      <th class='columnas'>BORRAR</th>
    </thead>
    <tbody>

    <?php
      
      $id = $_SESSION['idasesor'];
      require('../config/DataBase.php');
     
      $conn = new DataBase();
      $pdo = $conn->conexion();
     

      $fecha_actual = date("Y-m-d");
    
      $resultado_fecha = $pdo->prepare("SELECT * FROM ventas WHERE creado_by = :ID AND fecha_pago = :Fecha");
      $resultado_fecha->execute([':ID' => $id, ':Fecha' => $fecha_actual]);
      $arrFechas = $resultado_fecha->fetchAll();

      $total = count($arrFechas); ?>

      
      
      <?php foreach ($arrFechas as $item => $datos) {  ?>
        <tr>
          <td class='columnas' style="background-color: red;"><?php echo $datos['fecha_pago']; ?></td>
          <td class='columnas'><?php echo $datos['mes']; ?></td>
          <td class='columnas'><?php echo $datos['nombres']; ?></td>
          <td class='columnas'><?php echo $datos['cedula']; ?></td>
          <td class='columnas'><?php echo $datos['direccion']; ?></td>
          <td class='columnas'><?php echo $datos['plan']; ?></td>
          <td class='columnas'><?php echo $datos['telefono']; ?></td>
          <td class='columnas'><?php echo $datos['pedido']; ?></td>
          
          <td class='columnas' id="editar-tabla"><a href="VistaEditar.php?itemE=<?php echo $datos['id'] ?>"><img src="../public/editar.png" width="25px"></a>
          </td>
          <td class='columnas' id="eliminar-tabla"><a href="../controlador/MainController.php?delete=<?php echo $datos['id'] ?>"><img src="../public/eliminar.png" width="25px"></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>

  </table>
</div>
<script src="../includes/app.js"></script>
<script src="../includes/alertas.js"></script>
</body>

</html>