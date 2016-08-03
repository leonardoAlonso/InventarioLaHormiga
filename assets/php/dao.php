<?php include('conexion.php');
  /**
   *
   */
   include('errors.php');
  class DAO
  {
    function __construct()
    {

    }

    function viewData(){
      $conexion = new conexion();
      try{
        $conexion->conectar();
        $query = "SELECT * FROM productos";
        $res = $conexion->ejecutar($query);
        echo "<section class='wrapper'>";
        echo "<div>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>NOMBRE</th>";
        echo "<th>STOCK</th>";
        echo "<th>GANANCIAS</th>";
        echo "<th>PRECIO PUBLICO</th>";
        echo "<th>PRECIO PROVEEDOR</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        if(mysql_num_rows($res) > 0){
          while ($row = mysql_fetch_row($res)){
            echo "<tr>";
            echo "<td data-label='nombre'>$row[1]</td>";
            echo "<td data-label='stock' >$row[2]</td>";
            echo "<td data-label='ganancias' >$row[3]</td>";
            echo "<td data-label='precio publico'>$row[4]</td>";
            echo "<td data-label='precio proveedor'>$row[5]</td>";
            echo "</tr>";
          }
        }else{
          echo '<tr>
                  <td> Data not Found</td>
                </tr>';
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
      }catch(Exception $e){
        $e->getMessage();
      }
      $conexion ->close();
    }

    function add($nombre,$stock,$precio_publco,$precio_proveedor){
      try{
        if($nombre ==''&&$stock==0&&$precio_publco==0&&$precio_proveedor==0){
          echo "<script>alert('Hay un error');</script>";
        }else{
          $ganancias = ($precio_publco * $stock)-($precio_proveedor * $stock);
          $conexion = new conexion();
          $query = "SELECT * FROM productos";
          $res2 = $conexion -> ejecutar($query);
          $nums = mysql_num_rows($res2) + 1;
          $sql="INSERT INTO productos(id,Nombre,Stock,Ganancias,Precio_Publico,Precio_Proveedor) VALUES ('$nums','$nombre', '$stock', '$ganancias', '$precio_publco','$precio_proveedor')";
          $res = $conexion->ejecutar($sql);
          $conexion -> close();
          header('location:../html/inicio.php');
        }
      }catch(Exception $e){
        $e -> getMessage();
      }
    }

    function delete($nombre){
      try{
        $conexion = new conexion();
        $sql = "SELECT id FROM productos WHERE Nombre='$nombre'";
        $re = $conexion->ejecutar($sql);
        if($row = mysql_fetch_array($re)){
          $query = "DELETE  FROM productos WHERE Nombre = '$nombre'";
          $res = $conexion->ejecutar($query);
          echo "Se ha eliminado el registro";
        }else{
          $conexion -> close();
          echo "No se ha eliminado el registro";
        }
        $sql = "SELECT * FROM productos";
        $res = $conexion->ejecutar($sql);
        $indice = 1;
        while($rows = mysql_fetch_array($res)){
          $query = "UPDATE productos SET id ='$indice'";
          $res = $conexion->ejecutar($query);
          $indice += 1;
        }
        $conexion -> close();

      }catch(Exception $e){
        $e -> getMessage();
      }
    }

    function update($nombre,$stock,$entradas,$salidas,$precio_publico,$precio_proveedor){
      try{
        $conexion = new conexion();
        $sql = "SELECT * FROM productos WHERE Nombre='$nombre'";
        $re = $conexion->ejecutar($sql);
        if($row = mysql_fetch_array($re)){
          $id = $row['id'];
          if($entradas == 0 || $salidas == 0){
            $stock1 = $stock;
          }else{
            $stock1 = ($row['Stock'] + $entradas)-$salidas;
          }
          $ganancias = (($precio_publico * $stock1)-($precio_proveedor * $stock1));
          echo $ganancias;
          $query = "UPDATE productos SET Stock ='$stock1',Ganancias='$ganancias',Precio_Publico = '$precio_publico', Precio_Proveedor ='$precio_proveedor' WHERE id = '$id'";
          $res = $conexion ->ejecutar($query);
          $conexion ->close();
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }
  }

 ?>
