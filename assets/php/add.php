<?php
  include('dao.php');
  include('errors.php');
  if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $precio_publico = $_POST['precio_publico'];
    $precio_proveedor = $_POST['precio_proveedor'];
    #echo $nombre;
    $dao = new DAO();
    $dao -> add($nombre,$stock,$precio_publico,$precio_proveedor);

  }
 ?>
