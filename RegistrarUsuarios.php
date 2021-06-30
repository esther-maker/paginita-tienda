<?php


if(isset($_POST['registrar'])){

  require 'vendor/autoload.php';

  $nombre = $_POST['nombre'];
  $Apellido = $_POST['apellidos'];
  $user = $_POST['nombre_usuario'];
  $clave = $_POST['clave'];
  $correo = $_POST['email'];
  $telefono = $_POST['telefono'];
  $comentario = $_POST['comentario'];
   
  $usuario = new Kawschool\Usuarios;
  $resultado = $usuario->registrar($nombre,$Apellido,$correo,$telefono,$comentario, $user, $clave);

  header('Location: login.php');
  

  print '<pre>';
  print_r($resultado);

 


}