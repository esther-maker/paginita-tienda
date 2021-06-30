<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ArtShop</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css ?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>

  <body>

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
          <a class="navbar-brand" href="tienda.php"><i class="fas fa-store"></i>
          ArtShop
        </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav pull-right">

              <li>
                  <form action="index.php" method="POST">
                    <input   class=" form-control " type="search" name="busqueda" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success w-25" type="submit" >Buscar</button>
                  </form>
              </li>

            <li>
              <a href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i>
              
              <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
            </li>
            <li>
            <a href="../WebFinal/menuPrincipal.php"><i class="fas fa-home"></i></a>
            </li>

            <?php
             if (!isset($_SESSION["logueado"])){
  
              echo ' <li>
          
              <a href="login.php">Iniciar sesión</a> 
          
              </li>';
              
            }

            if (isset($_SESSION["logueado"]) && $_SESSION["logueado"] == TRUE){
              $roles = '
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['nombre_usuario'].'
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
              <li><a href="misPedido.php">Pedidos</a></li>
              <li><a href="#">Favoritos</a></li>


              ';
              if(isset($_SESSION["rol"])){  
                if($_SESSION["rol"] == 1){  
                $roles = $roles.'<li><a href="panel/dashboard.php">Panel</a></li>';
                }
              }
              $roles=$roles.'</ul>
          </li>    
              ';
              
              echo $roles;
            }

            ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    
    <div class="container" id="main">
      <center><h1>Pedidos</h1></center>
      <br>
      <div class="row central">
            <?php
              require 'vendor/autoload.php';

              $pelicula = new Kawschool\Pedido;
              $idCliente =  $_SESSION["id_cliente"];
        
              $info_peliculas = $pelicula->mostrarPedidoPorId();
              
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_peliculas[$x];
            ?>
            <div>
     
            </div>
              <div class="col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading cancelar">
                      <p></p>
                      <h1 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h1>   
                      <p class="equis"><a name="idProducto" href="eliminarProPedido.php?ID=<?php print $item['id']?>" class=""><i class="fas fa-times"></i></a></p>
                      
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                        <div>
                        </div>
                        <div class="centralImagen">    
                          <a href="VerDetalleProducto.php?id=<?php print $item['id'] ?>"><img src="<?php print $foto; ?>" class="img-responsive imgListas imgcentrada"></a>
                          </div>
                          <div class="informacion-img">
                          <p>ID: <?php print $item['id'] ?></p>

                          <p>Precio: <?php print $item['precio'] ?></p>
                          <p>Cantidad: <?php print $item['cantidad'] ?></p>
                          <p>Total: <?php print ($item['precio'] * $item['cantidad'])?> </p>
                          </div>
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                      <!--<center>  <?php print ($item['precio'] * $item['cantidad'])?></center>-->

                        
                    </div>
                  </div>


              </div>
          <?php
                }
                 echo '<h3> Total compra </h3>'.$item['total'];
                 echo '</br>';
                
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>


    </div> <!-- /container --> 

    <br>
    <br>
            <div class="CentralBTN">      
              <a href="cancelarPedidoPorID.php" id="btnImprimir" class="btn btn-danger hidden-print">Cancelar pedido</a>  
            </div>


<br>
<br>
<br>

<br>
<br>
<br>

<br>
<br>
<br>


<br>
<br>
<br>

<br>
<br>
<br>

<br>
<br>
<br>

<br>
<br>
<br>


<br>
<br>
<br>


    <footer>
	<div class="body-footer">
		<div class="div-flex mb20">
			<div class="part">
      <h4 class="mb10">Redes sociales</h4>
				 <ul class="social-icon">
                 <li><a href="https://www.instagram.com/arte.historia.xix/" class="fa fa-instagram" target="_blank"></a></li>
                     
                    </ul>
			</div>
			<div class="part">
			</div>
		</div>
		<center><h5>Copyright © 2021 Esther Inc</h5></center>
	</div>
</footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://kit.fontawesome.com/af51009677.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
