<?php session_start();
require('header.php');
require_once('../includes/alertas.php');
?>
   
<div id="main-buscar">
  
    <div class="padre-menu-desktop">
    <?php require('menuDesktop.php') ?>
    </div>

  <div class="padre-hamburguesa"> 
   <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>
   <?php require('menuResponsive.php');

   if(isset($_SESSION['cedulaEmpty'])){
      $alert = new Alertas();
      $alert->buscarCedula();
      } unset($_SESSION['cedulaEmpty']);

    if(isset($_SESSION['cedulaNotFound'])){
         $var = $_SESSION['cedulaNotFound'];
         $alert = new Alertas();
         $alert->cedulaNotFound($var);
      } unset($_SESSION['cedulaNotFound']);

   ?>

    <div id="form-buscar">
      
      <h3 id="title-buscar">Buscando con cedula</h3>

      <form action="encontrado.php" method="post">
        <input type="hidden" name="buscar">
        <input type="hidden" name="creado_by" value="<?php echo $_SESSION['idasesor'] ?>">
        <input type="number" placeholder="Ingrese Numero De Cedula" id="input-buscar-cedula" name="buscar-cedula">
        <button id="btn-buscar-cedula" type="submit">Buscar</button>
      </form>
      <a href="buscarPorPedido.php" id="enlace-buscar">Click Buscar por numero de pedido</a>
   </div>  

</div>
<script src="../includes/app.js"></script>
</body>

</html>