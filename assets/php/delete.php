<?php
  include('dao.php');
  include('errors.php');
    try{
      #echo "<script>alert('Eliminar');</script>";
      $dao = new Dao();
      $nombre = $_POST['nombre'];
      $dao -> delete($nombre);
      #echo "Se ha eliminado";
      echo $nombre;
      header('location:../html/inicio.php');
    }catch(Exception $e){
      echo $e->getMessage();
    }
 ?>
