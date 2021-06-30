<?php

session_start();
echo 'antes';

if(($_SERVER['REQUEST_METHOD'] =='GET')){
    echo 'Hola';
    require 'funciones.php';
    require 'vendor/autoload.php';
    
      
    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $cliente = new Kawschool\Cliente;
    
        
        $_params = array(
            'nombre' => $_SESSION['nombre_usuario'],
            'apellidos' =>  $_SESSION['apellidos'],
            'email' =>  $_SESSION['email'],
            'telefono' => $_SESSION['telefono'],
            'comentario' => $_SESSION['comentario']
        );
    
        $cliente_id = $cliente->registrar($_params);
    
        
        $pedido = new Kawschool\Pedido;
    
        $_params = array(
            'cliente_id'=> $_SESSION["id_cliente"],
            'total' => calcularTotal(),
            'fecha' => date('Y-m-d')
        );
        
        $pedido_id =  $pedido->registrar($_params);

        foreach($_SESSION['carrito'] as $indice => $value){
            $_params = array(
                "pedido_id" => $pedido_id,
                "pelicula_id" => $value['id'],
                "precio" => $value['precio'],
                "cantidad" => $value['cantidad'],
            );

            $pedido->registrarDetalle($_params);
        }

        $_SESSION['carrito'] = array();

        header('Location: gracias.php');

    }

    

     




}