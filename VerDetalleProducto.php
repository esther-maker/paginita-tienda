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
<div id="fb-root"></div>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
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
            <form action="tienda.php" method="POST">
              <input class=" form-control " type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success w-25" type="submit">Buscar</button>
            </form>
          </li>
          <li>
            <a href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i>

              <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
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
              <li><a href="favoritos.php">Favoritos</a></li>


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
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>



  <div class="container" id="main">

    <section class="row SeccionEspecial">
      <?php   require 'vendor/autoload.php';
              $id = $_GET ["id"];
              $pelicula = new Kawschool\Pelicula;
              $info_peliculas = $pelicula->mostrarPorId($id);
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                // var_dump($info_peliculas);
                ?>
      <div class="">

      <br>
      <br>
      <br>

        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>
        <img id="myImg" src="upload/<?= $info_peliculas["foto"] ?>" class="img-responsive img-grande claseImgEspecial">
        <br>

      </div>

      <div class="col-md-5 descripciones">


        <h2 class="h2Especial"><?= $info_peliculas["titulo"] ?> </h2>
        <h1 class="h1Especial">RD$<?= $info_peliculas["precio"] ?></h1>
        <h3 class="h3Especial"><?= $info_peliculas["descripcion"] ?></h3>
        <br>
        <br>

        <form action="VerDetalleProducto.phyp" method="POST">       
        <a href="" class="btn btn-warning btn-block" name="favoritos"><span
            class="glyphicon glyphicon-star"></span>Agregar a favoritos</a>
        </form>

        <br>
        <a href="carrito.php?id=<?php print $info_peliculas['id'] ?>" class="btn btn-success btn-block"><span
            class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito</a>
        <br>
        <br>

      </div>
      <?php
              }
              else{
                echo "Error 404 no se encontro el producto";
              }
      ?>


    </section>
    <div class="row">
      <?php 
             require 'vendor/autoload.php';
              $pelicula = new Kawschool\Pelicula;
              $info_peliculas = $pelicula->mostrar();
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_peliculas[$x];
            ?>
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h1>
          </div>
          <div class="panel-body">
            <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
            <a href="VerDetalleProducto.php?id=<?php print $item['id'] ?>"><img src="<?php print $foto; ?>"
                class="img-responsive imgListas"></a>

            <?php }else{?>
            <img src="assets/imagenes/not-found.jpg" class="img-responsive">
            <?php }?>
          </div>
          <div class="panel-footer">
            <!--<center> $ <?php print $item['precio'] ?></center>

                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito
                          
                        </a>-->
          </div>
        </div>


      </div>
      <?php
                }
            }else{?>
      <h4>NO HAY REGISTROS</h4>

      <?php }?>




    </div>


  </div> <!-- /container -->
  

  
  
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    modal.onclick = function () {
      modal.style.display = "none";
    }
  </script>
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
  <script src="https://kit.fontawesome.com/af51009677.js" crossorigin="anonymous"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  


</body>

</html>