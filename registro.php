<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ArtShop</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css ?v=<?php echo(rand()); ?>">
  </head>

  <body >

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top colorNavegacion">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ArtShop</a>
        </div>
       
      </div>
    </nav>

    <div class="container" id="main">
        <div class="main-login">
            <form action="RegistrarUsuarios.php" method="post">
                <div class="panel panel-default panelEspecial">
                    <div class="panel-heading">
                        <h3 class="text-center">Registrate!</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <img src="" alt="">
                        </p>

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="nombre_usuario" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="clave" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" name="email" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="" required>
                        </div>

                        <div class="form-group">
                                    <label>Dirección</label>
                                    <textarea name="comentario" class="form-control"  rows="2" required></textarea>
                        </div>

                        <div class="form-group colorLink">
                        <a href="login.php">¿Tienes cuenta? Inicia sesión</a>
                        </div> 
                        

                        <button type="submit" class="btn btn-primary btn-block" name="registrar">Registrarse</button>
                        <br>



                    </div>
                </div>
            </form>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>