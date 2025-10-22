<?php require('header.php'); ?>

<?php
require('../controlador/AdminUsuarios.php');
$id = $_GET['itemE'];
$dat = new AdminUsuarios();
$datos = $dat->funEdit($id);
$passOriginal = $datos['clave'];

?>


<div id="main-editar-asesores">

<div id="main-registros">
        <div class="padre-menu-desktop">
          <?php require('menuDesktop.php') ?>
          </div>

   <div class="padre-hamburguesa"> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>

  <?php require('menuResponsive.php'); ?>
  <h5 class="titulo-editar">MODO EDITAR ADMIN</h5>

 
    <form action="../controlador/AdminUsuarios.php" method="post" id="" class="form-editar-asesores">
    
      <input type="hidden" name="actualizar-usuarios" />
      <input type="text" class="input-editar-asesores" name="id_asesor" readonly  placeholder="mes" value="<?php echo $datos['id_asesor'] ?>" />
      <input type="text" class="input-editar-asesores" name="usuario" placeholder="nombres" value="<?php echo $datos['usuario'] ?>" />
      <input type="text" class="input-editar-asesores" name="clave" placeholder="Restablecer Clave"  />
      <input type="text" class="input-editar-asesores" name="rol" placeholder="rol" value="<?php echo $datos['rol'] ?>" />
     
      <button class="btn-editar-asesores" type="submit" id="guardar-editar">Actualizar</button>
  
  </form>
</div>

<script src="../includes/app.js"></script>
</body>

</html>