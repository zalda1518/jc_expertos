<?php require('header.php');
require('../controlador/MainController.php'); 
require_once('../controlador/Redirect.php');
require_once('../includes/alertas.php'); ?>
<script src="../includes/app.js"></script>


<div id="main-encontrado">
  <div class="padre-menu-desktop">
    <?php require('menuDesktop.php') ?>
    </div>

   <div class="padre-hamburguesa"> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>

  <?php require('menuResponsive.php')?> 

   <table border="solid 1px" id="table-encontrado">
    <thead>
      <th class="columnas">ID</th>
      <th class="columnas">ATENDIO</th>
      <th class="columnas">FECHA</th>
      <th class="columnas">CLIENTE</th>
      <th class="columnas">CEDULA</th>
      <th class="columnas">DIRECCION</th>
      <th class="columnas">TELEFONO</th>
      <th class="columnas">PEDIDO</th>
      <th class="columnas">SERVICIO</th>
      <th class="columnas">EDITAR</th>
      <th class="columnas">BORRAR</th>
    </thead>

    <?php 

      if(empty($_POST['buscar-pedido'])){

          $_SESSION['pedidoEmpty'] ='si';
          new Redirect('buscarPorPedido.php');
          
       }
        
        if(isset($_POST['buscar-pedido'])){
          $dataa = $_POST; 
          $obj = new MainController();
          $dat = $obj->searchPedido($dataa);
          $datos = $dat;


        if(empty($dat)){
         $var = $_POST['buscar-pedido'];
         $_SESSION['pedidoNotFound'] = $var;
         new Redirect('buscarPorPedido.php');
          die;
       } ?>

        <?php foreach ($datos as $valor) {  ?>
     <tbody>
        <td><?php echo $valor['id'] ?></td>
        <td><?php echo $_SESSION['start'] ?></td>
        <td><?php echo $valor['fecha_creacion'] ?></td>
        <td><?php echo $valor['nombres'] ?></td>
        <td><?php echo $valor['cedula'] ?></td>
        <td><?php echo $valor['direccion'] ?></td>
        <td><?php echo $valor['telefono'] ?></td>
        <td><?php echo $valor['pedido'] ?></td>
        <td><?php echo $valor['servicio'] ?></td>
        <td class='columnas' id="editar-tabla"><a href="VistaEditar.php?itemE=<?php echo $valor['id'] ?>"><img src="../public/editar.png" width="25px"></a>
        </td>
        <td class='columnas' id="eliminar-tabla"><a href="../controlador/MainController.php?delete=<?php echo $valor['id'] ?>"><img src="../public/eliminar.png" width="25px"></a>
        </td>

      </tbody>  
    
     <?php  } }?> 
    </table>
    

</div> 

</body>

</html>