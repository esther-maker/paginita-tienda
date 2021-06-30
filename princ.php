<?php
   

    if(isset($_SESSION['user'] )) {
        echo '
       <script>

         window.location.replace("index.php");
       </script>
       
    ';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title> 
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link rel="stylesheet" href="estilos.css">
    

</head>  
<body>
   
    <form class="formulario" method="POST">
    
    <h1>Iniciar sesión</h1>
     <div class="contenedor">
  
       
         
         <div class="input-contenedor">
         <i class=" fas fa-user icon"></i>
         <input type="text" placeholder="Nombre" name="Usuario">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" placeholder="Contraseña" name="Contraseña">
         
         </div>
         <input type="submit" value="Ingresar" class="button" name="boton">
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿No tienes una cuenta? <a class="link" href="registrarvista.php">Registrate </a></p>
     </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          include("conexion_db.php");
    }
  
        
    ?>
</body>
</html>