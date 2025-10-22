<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mis seguimientos</title>
    <link rel="stylesheet" href="../includes/index.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
<!--  <div class="header">
      <div class="header-child">
        <a href="Registros.php" id="header-registros" class="btn-header">REGISTROS</a>
        <a href="buscar.php" id="header-buscar" class="btn-header">BUSCAR</a>
        <a href="crear.php" id="header-buscar" class="btn-header">INICIO</a>

                <!--se muestras el menu solo para administradores -->
        <?php // if(isset($_SESSION['rol']) AND $_SESSION['rol'] == 'administrador' ){
             // require('botonesAdmin.php'); } ?>
                <!--se muestras el menu solo para administradores -->
        </div>
    </div>  
