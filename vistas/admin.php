<?php
session_start();
require('header.php');
?>
 

<div id="main-administrar">

    <div class="padre-menu-desktop">
    <?php require('menuDesktop.php') ?>
    </div>

   <div class="padre-hamburguesa"> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>

   <?php require('menuResponsive.php') ?>
   

  <form action="../controlador/AdminUsuarios.php" method="post" id="form-administrar">
  
        <input type="hidden" name="crear-usuarios" />
        <input type="text" class="crear-asesores" name="usuario" id="mes" placeholder="Usuario" />
        <input type="text" class="crear-asesores" name="clave" id="mes" placeholder="Clave" />
        <input type="text" class="crear-asesores" name="rol" id="mes" placeholder="Rol" />

        <button class="btn-crear-asesores" type="submit" id="">Guardar</button>
        
    </div>

  </form>
</div>

<script src="../includes/app.js"></script>
</body>

</html>






