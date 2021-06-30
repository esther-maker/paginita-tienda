<?php

session_start();


    require 'vendor/autoload.php';

    if(isset($_POST['registrar'])){
        $cliente = new Kawschool\Cliente;
    
        $_params = array(
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'comentario' => $_POST['comentario'],
            ":Usuario" => $_POST['nombre_usuario'],
            ":Contraseña" => $_POST['clave']
        );
    
        $cliente_id = $cliente->registrar($_params);
        header('location: index.php');
     }
    


   