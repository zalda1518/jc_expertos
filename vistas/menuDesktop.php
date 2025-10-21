
      <div class="menu-hijo-desktop">

      <label  class="btn-menu-desktop" >
            <img src="../public/inicio.png" width="40px">
             <a href="crear.php" >CREAR</a>
            </img>
       </label> 
      
       <label  class="btn-menu-desktop" >
            <img src="../public/registros.png" width="40px">
            <a href="Registros.php" >REGISTROS</a>
           </img>  
      </label> 

       <label  class="btn-menu-desktop" >
            <img src="../public/buscar.png" width="40px" >
             <a href="buscar.php" >BUSCAR</a>
            </img>
       </label> 
        
      <!--se muestras el menu solo para administradores -->
        <?php  if(isset($_SESSION['rol']) AND $_SESSION['rol'] == 'administrador' ){
              require('botonesAdminDesktop.php'); } ?>
       <!--se muestras el menu solo para administradores -->
       
       <label  class="btn-menu-desktop" >
            <img src="../public/cerrar.png" width="40px" >
            <a href="../controlador/MainController.php?cerrar=cerrar"  name="close">CERRAR</a>
            </img>
       </label> 


             
       </div>

