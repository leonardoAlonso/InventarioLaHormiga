<?php
  include('dao.php');

  if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $precio_publico = $_POST['precio_publico'];
    $precio_proveedor = $_POST['precio_proveedor'];

    $nombre = stripslashes($nombre);
    $stock = stripslashes($stock);
    $precio = stripslashes($precio);

    $nombre = mysql_real_escape_string($nombre);
    $stock = mysql_real_escape_string($stock);
    $precio = mysql_real_escape_string($precio);

    $dao = new DAO();
    $dao -> add($nombre,$stock,$precio_publico,$precio_proveedor);
    header('location:../html/inicio.php');
  }
 ?>
