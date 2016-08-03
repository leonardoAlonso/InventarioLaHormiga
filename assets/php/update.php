<?php
  include('dao.php');
  include('errors.php');
  try{
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $entradas = $_POST['entradas'];
    $salidas = $_POST['salidas'];
    $precio_publico = $_POST['precio_pubilco'];
    $precio_proveedor = $_POST['precio_proveedor'];
    $dao = new dao();

    $dao -> update($nombre,$stock,$entradas,$salidas,$precio_publico,$precio_proveedor);

    header('location:../html/inicio.php');

  }catch(Exception $e){
    echo $e->getMessage();
  }
 ?>
