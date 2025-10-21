<div class="menu-padre" onclick="CloseMenu()">
      <div class="menu-child" id="menu-child">
        <a href="Registros.php" id="menu-registros" class="btn-menu">REGISTROS</a>
        <a href="buscar.php" id="menu-buscar" class="btn-menu">BUSCAR</a>
        <a href="crear.php" id="menu-crear" class="btn-menu">INICIO</a>
   <!--se muestras el menu solo para administradores -->
        <?php  if(isset($_SESSION['rol']) AND $_SESSION['rol'] == 'administrador' ){
              require('botonesAdmin.php'); } ?>
  <!--se muestras el menu solo para administradores -->
        <a href="../controlador/MainController.php?cerrar=cerrar"  class="btn-menu" name="close">CERRAR</a>       
       </div>
</div>