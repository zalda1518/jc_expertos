<?php require('header.php');
require_once('../controlador/Redirect.php');
?>


<div id="main-crear">

  <div class="padre-menu-desktop">
    <?php require('menuDesktop.php') ?>
  </div>

  <div class="padre-hamburguesa">
    <img src="../public/menu.png" class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>


  <?php require('menuResponsive.php') ?>

  <div class="div-sesion">
    <?php
    // validar la sesion iniciada 
    if (!isset($_SESSION['start'])) {
      new Redirect('../index.php');
    } else {
      echo $_SESSION['start'];
      $Rol = $_SESSION['rol'];
      echo "<br> $Rol <br/>";
    }  // validar la sesion iniciada  
    ?>

  </div>

  <form action="../controlador/MainController.php" method="post" id="formulario">
    <div class="" id="crear-registros">

      <!-- alertas -->
      <?php if (isset($_SESSION['saved'])) { ?>
        <script>
          Swal.fire({
            title: "Guardado Correctamente",
            text: "se creo el registro con exito en base de datos",
            icon: "success"
          })
        </script>
      <?php unset($_SESSION['saved']);
      } ?>

      <?php if (isset($_SESSION['Nosaved'])) { ?>
        <script>
          Swal.fire({
            title: "Error al Guardar",
            text: "Verifique todos los campos obligatorios",
            icon: "error"
          });
        </script>
      <?php
        unset($_SESSION['Nosaved']);
      } ?>
      <!-- alertas -->

      <input type="hidden" name="action" />
      <input type="hidden" name="creado_by" value="<?php echo $_SESSION['idasesor'] ?>" />

      <input type="text" class="input-registros" name="mes" id="mes" placeholder="ingrese el mes de la venta" />
      <input type="text" class="input-registros" name="nombres" id="mes" placeholder="ingrese el nombre del cliente" />
      <input type="text" class="input-registros" name="cedula" id="cliente" placeholder="cedula del cliente" />
      <input type="text" class="input-registros" name="direccion" id="direccion" placeholder="direccion del cliente" />
      <input type="text" class="input-registros" name="telefono" id="telefono" placeholder="telefono del cliente" />
      <textarea type="text" class="input-registros" name="servicio" id="plan" placeholder="Servicio...." /></textarea>

      <button class="btn-registros" type="submit" id="guardar">Guardar</button>

    </div>

  </form>
</div>


<script src="../includes/app.js"></script>
</body>

</html>