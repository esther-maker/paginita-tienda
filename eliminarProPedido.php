<?php

session_start();
  $conexion = new mysqli("localhost", "root", "", "tienda_online");

  $conexion->query("SET NAMES 'utf8'");


  $id_usuario = $_SESSION['id_cliente'];
  $id = $_GET['ID'];
  

  $sql =  "DELETE detalle_pedidos FROM detalle_pedidos INNER JOIN pedidos ON detalle_pedidos.pedido_id = pedidos.id INNER JOIN clientes ON pedidos.cliente_id = clientes.id WHERE detalle_pedidos.pelicula_id = $id and pedidos.cliente_id = $id_usuario";
   


  $resultado= mysqli_query($conexion, $sql);

  if($resultado){                             
              header('Location:misPedido.php');
    }

      




  
  


  