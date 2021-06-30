<?php

session_start();

/*if($_SERVER['REQUEST_METHOD'] ==='POST'){

  $nombre_usuario = $_POST['nombre_usuario'];
  $clave = $_POST['clave'];
   
  require 'vendor/autoload.php';
  $usuario = new Kawschool\Usuarios;
  $resultado = $usuario->loginC($nombre_usuario, $clave);*/



  $conexion = new mysqli("localhost", "root", "", "tienda_online");

  $conexion->query("SET NAMES 'utf8'");

  $nombre_usuario = $_POST['nombre_usuario'];
  $clave = $_POST['clave'];

  

  $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$clave'";

  $resultado= mysqli_query($conexion, $sql);
   
  if($resultado){
      $filasConsulta = mysqli_num_rows($resultado);
      
      if($filasConsulta > 0){

      while($row = mysqli_fetch_array($resultado)) {
                   $_SESSION["id_cliente"] = $row["id"];					
                   $_SESSION['nombre_usuario'] = $row["nombre"];
                   $_SESSION['apellidos'] = $row["apellidos"];
                   $_SESSION['email'] = $row["email"];
                   $_SESSION['telefono'] = $row["telefono"];
                   $_SESSION['comentario'] = $row["comentario"];
                   $_SESSION['rol'] = $row["rol"];
                   
                  
                  
                  $_SESSION['logueado'] = TRUE;              
              }

              header('Location:tienda.php');
    }

    else {
      header("Location:tienda.php?alert=error");
      
    }
      
  }

  else{
  header('location:tienda.php?alert=error');
  }


  
  


  