<?php

session_start();

  $conexion = new mysqli("localhost", "root", "", "tienda_online");

  $conexion->query("SET NAMES 'utf8'");

  $id_usuario = $_SESSION['id_cliente'];
  
  $sql =  "DELETE pedidos FROM pedidos INNER JOIN detalle_pedidos ON pedidos.id = detalle_pedidos.pedido_id INNER JOIN clientes ON pedidos.cliente_id = clientes.id WHERE clientes.id = $id_usuario"; 


  $resultado= mysqli_query($conexion, $sql);
   
  if($resultado){
      echo ' <script>
      alert("El usuario ya existe, por favor, intente introducir otro");
    </script>';
             
    }

    header('Location:misPedido.php');

      




  
  


  