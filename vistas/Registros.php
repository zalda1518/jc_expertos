<?php

use function PHPSTORM_META\type;

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
      <th class='columnas'>FECHA</th>
      <th class='columnas'>ATENDIO</th>
      <th class='columnas'>CLIENTE</th>
      <th class='columnas'>CEDULA</th>
      <th class='columnas'>DIRECCION</th>
      <th class='columnas'>SERVICIO</th>
      <th class='columnas'>TELEFONO</th>
      <th class='columnas'>PEDIDO</th>
      <th class='columnas'>EDITAR</th>
      <th class='columnas'>BORRAR</th>
    </thead>
    <tbody>

      <?php
      
      $id_asesor = $_SESSION['idasesor'];
      require('../config/DataBase.php');
     
      $conn = new DataBase();
      $pdo = $conn->conexion();
      $query = $pdo->prepare("SELECT * FROM ventas_jc WHERE creado_by = $id_asesor ORDER BY mes ASC");
      $query->execute();
      $arr = $query->fetchAll();
     
      ?>
      
      <?php foreach ($arr as $item => $datos) {  ?>
        <tr>
          <td class='columnas'><?php echo $datos['fecha_creacion']; ?></td>
          <td class='columnas'><?php echo $_SESSION['start']; ?></td>
          <td class='columnas'><?php echo $datos['nombres']; ?></td>
          <td class='columnas'><?php echo $datos['cedula']; ?></td>
          <td class='columnas'><?php echo $datos['direccion']; ?></td>
          <td class='columnas'><?php echo $datos['servicio']; ?></td>
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