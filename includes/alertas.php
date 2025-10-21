<?php 
class Alertas {
  
    public function Actualizado (){
       
      echo "<script>
                 Swal.fire({
                 title: 'Registro Actualizado Con Exito',
                 text:'se actualizo el registro con exito en base de datos',
                 icon: 'success'
                });
       </script>";
     }
    
     public function Eliminado (){
       
        echo "<script>
                   Swal.fire({
                   title: 'Registro Eliminado Con Exito',
                   text:'se Elimino el registro  en base de datos',
                   icon: 'error'
                  });
         </script>";
       }
      
       public function usuarioIncorrecto (){
       
        echo "<script>
                   Swal.fire({
                   title: 'Usuario o Contraseña Incorrectos',
                   text:'verifique que haya escrito bien el usuario o contraseña',
                   icon: 'error'
                  });
         </script>";
       }

       public function camposVacios (){
       
        echo "<script>
                   Swal.fire({
                   title: 'Hay algun Campo Vacio',
                   text:'algunos campos son obligatorios',
                   icon: 'error'
                  });
         </script>";
       }

       public function Guardado (){
       
        echo "<script>
                   Swal.fire({
                   title: 'Guardado Con Exito',
                   text:'se creo el registro en la base de datos',
                   icon: 'success'
                  });
         </script>";
       }

       public function NoGuardado (){
       
        echo "<script>
                   Swal.fire({
                   title: 'Error Al Guardar',
                   text: no se pudo crear el registro en la base de datos',
                   icon: 'error'
                  });
         </script>";
       }

       public function buscarCedula (){
       
        echo "<script>
                   Swal.fire({
                   title: 'El Campo Esta Vacio',
                   text:'ingrese el numero de la cedula para realizar la busqueda',
                   icon: 'error'
                  });
         </script>";
       }

       public function cedulaNotFound ($var){
       
        echo "<script>
                   Swal.fire({
                   title: 'No se Encontro Registro Con La Cedula',
                   text:$var,
                   icon: 'error'
                  });
         </script>";
       }

       public function buscarPedido (){
       
        echo "<script>
                   Swal.fire({
                   title: 'El Campo Esta Vacio',
                   text:'ingrese el numero del pedido',
                   icon: 'error'
                  });
         </script>";
       }

        public function pedidoNotFound ($var){
       
        echo "<script>
                   Swal.fire({
                   title: 'No se Encontro Registro con el pedido',
                   text:$var,
                   icon: 'error'
                  });
         </script>";
       }




      }

