<?php require('header.php'); ?>

<?php
require('../controlador/MainController.php');
$id = $_GET['itemE'];
$dat = new MainController();
$datos = $dat->funEdit($id); ?>

<div id="main-editar-clientes">

         <div class="padre-menu-desktop">
          <?php require('menuDesktop.php') ?>
          </div>


   <div class="padre-hamburguesa"> 
   <?php require('menuResponsive.php') ?> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>
   
  <div class="div-editar-clientes" id="editar-clientes">
      
      <form action="../controlador/MainController.php" method="post" id="form-editar-clientes">
      
      <input type="hidden" name="actualizar" />
      <input type="hidden" name="creado_by" value="<?php echo $datos['creado_by'] ?>" />
      <input type="hidden" name="id" value="<?php echo $datos['id'] ?>" />
      
      <input type="text" class="input-editar-usuarios" name="fecha_creacion" placeholder="fecha pago" value="<?php echo $datos['fecha_creacion'] ?>" />
      <input type="text" class="input-editar-usuarios" name="mes" placeholder="mes" value="<?php echo $datos['mes'] ?>" />
      <input type="text" class="input-editar-usuarios" name="nombres" placeholder="nombres" value="<?php echo $datos['nombres'] ?>" />
      <input type="text" class="input-editar-usuarios" name="cedula" placeholder="cedula" value="<?php echo $datos['cedula'] ?>" />
      <input type="text" class="input-editar-usuarios" name="direccion" placeholder="direccion" value="<?php echo $datos['direccion'] ?>" />
      <textarea  class="input-editar-usuarios" name="servicio"   /><?php echo $datos['servicio'] ?></textarea>
      <input type="text" class="input-editar-usuarios" name="telefono" placeholder="telefono" value="<?php echo $datos['telefono'] ?>" />
      <input type="text" class="input-editar-usuarios" name="pedido" placeholder="pedido" value="<?php echo $datos['pedido'] ?>" />
      <button class="guardar-editar-usuarios" type="submit" id="guardar-editar">Actualizar</button>
      
  </div>
  </form>
</div>

<script src="../includes/app.js"></script>
</body>

</html>