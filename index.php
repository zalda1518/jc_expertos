<?php session_start();?>
<?php  require_once('includes/alertas.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>INVENTARIOS</title>
  <link rel="stylesheet" href="includes/index.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="includes/alertas.js"></script>
</head>

<body>
  <?php // para validar sesion iniciada y no volverse a logear //
  if (isset($_SESSION['start'])) {
      require_once('controlador/Redirect.php');
      new Redirect('/vistas/crear.php');
    }
    // para validar sesion iniciada y no volverse a logear ?>  
  
                  <!-- alertas -->  
  <?php if(isset($_SESSION['nostart'])) { 
          $alert = new Alertas();
          $alert->usuarioIncorrecto();
          session_unset();
           }  

      else if(isset($_SESSION['vacios'])) {
            $alert = new Alertas();
            $alert->camposVacios();
            session_unset();
          }  ?>
                  <!-- alertas -->  

  <div id="main-login">
    <form action="controlador/Login.php" method="post" id="login" class="form-login">
      <input type="hidden" name="ingresar" /> 
     <div class="div-input-login">
        <input class="login-input" type="text" name="usuario" id="usuario" placeholder="usuario" />
        <input class="login-input" type="password" name="clave" id="clave" placeholder="clave" />
    </div>

      <button class="ingresar" type="submit" id="ingresar">INGRESAR</button>
      
      <a href="" class="leyenda">Recuperar Contraseña</a>
    </form>
  </div>

  
 
</body>

</html>