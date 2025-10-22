<?php require('header.php');?>

<?php require_once('../includes/alertas.php');
if ($_SESSION['rol'] !== 'administrador'){
  echo "<script>alert('no tienes permisos para estar aqui');
              window.location.href='crear.php';
      </script>";
} 
?>
<!-- alertas -->  
<?php if(isset($_SESSION['usuarioCreado'])) { 
         $alert = new Alertas();
          $alert->Guardado();
          unset($_SESSION['usuarioCreado']);
          }  
          if(isset($_SESSION['usuarioNoCreado'])) {
            $alert = new Alertas();
             $alert->camposVacios();
             unset($_SESSION['usuarioNoCreado']);
           }
           if(isset($_SESSION['usuarioActualizado'])){
            $alert = new Alertas();
             $alert->Actualizado();
             unset($_SESSION['usuarioActualizado']);  
          }  
          if(isset($_SESSION['usuarioBorrado'])){
            $alert = new Alertas();
             $alert->Eliminado();
             unset($_SESSION['usuarioBorrado']);  
          }   
           ?>
<!-- alertas -->  
 
 <div id="main-asesores">
 <div class="padre-menu-desktop">
 <?php require('menuDesktop.php') ?>
 </div>

  <div class="padre-hamburguesa"> 
        <img src="../public/menu.png"  class="hamburguesa" id="hamburguesa" onclick="Menu()">
  </div>

  <?php require('menuResponsive.php') ?>
        <table class="table-usuarios">
          <thead>
            <th class='columnas'>ID ASESOR</th>
            <th class='columnas'>USUARIO</th>
            <th class='columnas'>CLAVE</th>
            <th class='columnas'>ROL</th>
            <th class='columnas'>EDITAR</th>
            <th class='columnas'>BORRAR</th>
          </thead>
          <tbody>
   <?php
      
            
            $id = $_SESSION['idasesor'];
            require('../config/DataBase.php');
            $conn = new DataBase();
            $pdo = $conn->conexion();
            $query = $pdo->prepare("SELECT * FROM usuarios_jc");
            $query->execute();
            $arr = $query->fetchAll();
            ?>

            <?php foreach ($arr as $item => $datos) {  ?>
              <tr>
                <td class='columnas'><?php echo $datos['id_asesor']; ?></td>
                <td class='columnas'><?php echo $datos['usuario']; ?></td>
                <td class='columnas'>********</td>
                <td class='columnas'><?php echo $datos['rol']; ?></td>
                
                
                <td class='columnas' id="editar-tabla"><a href="vistaEditarAsesores.php?itemE=<?php echo $datos['id_asesor'] ?>"><img src="../public/editar.png" width="25px"></a>
                </td>
                <td class='columnas' id="eliminar-tabla"><a href="../controlador/AdminUsuarios.php?delete=<?php echo $datos['id_asesor'] ?>"><img src="../public/eliminar.png" width="25px"></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>

  </table>
</div>
  <script src="../includes/app.js"></script>
</body>

</html>