<?php require('header.php');
require_once('../includes/alertas.php');
?>
   
<div id="main-buscar">
  
    <div class="padre-menu-desktop">
    <?php require('menuDesktop.php') ?>
    </div>

  <div class="padre-hamburguesa"> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>
   <?php require('menuResponsive.php');?>
   

    <div id="form-buscar">
      
      <h3 id="title-buscar">Buscando con pedido</h3>

      <form action="encontradoPedido.php" method="post">
        <input type="hidden" name="buscarPedido">
        <input type="hidden" name="creado_by" value="<?php echo $_SESSION['idasesor'] ?>">
        <input type="number" placeholder="Ingrese Numero Del pedido" id="input-buscar-cedula" required name="buscar-pedido">
        <button id="btn-buscar-cedula" type="submit">Buscar</button>
      </form>
      <a href="buscar.php" id="enlace-buscar">Click Buscar por numero de cedula</a>
   </div>  

</div>
<script src="../includes/app.js"></script>
</body>

</html>