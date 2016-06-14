<?php include('conexion.php');
  /**
   *
   */
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
        $num = mysql_num_rows($res);
        echo "<section class='wrapper'>";
        echo "<div>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>STOCK</th>";
        echo "<th>GANANCIAS</th>";
        echo "<th>PRECIO PUBLICO</th>";
        echo "<th>PRECIO PROVEEDOR</th>";
        echo "<th>Opciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        if(mysql_num_rows($res) > 0){
          while ($row = mysql_fetch_row($res)){
            echo "<tr>";
            echo "<td data-label='id' contenteditable>$row[0]</td>";
            echo "<td data-label='nombre' contenteditable>$row[1]</td>";
            echo "<td data-label='stock' contenteditable>$row[2]</td>";
            echo "<td data-label='ganancias' contenteditable>$row[3]</td>";
            echo "<td data-label='precio publico'contenteditable>$row[4]</td>";
            echo "<td data-label='precio proveedor'contenteditable>$row[5]</td>";
            echo "<td><button name='btn_delete' id = 'btn_delete' data-id3='$row[0]'><span class='icon-cross'></span> </button></td>";
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
      $ganancias = ($precio_publco * $stock)-($precio_proveedor * $stock);
      try{
        $conexion = new conexion();
        $query = "SELECT * FROM productos";
        $res2 = $conexion -> ejecutar($query);
        $nums = mysql_num_rows($res2) + 1;
        $sql="INSERT INTO productos(id,Nombre,Stock,Ganancias,Precio_Publico,Precio_Proveedor) VALUES ('$nums','$nombre', '$stock', '$ganancias', '$precio_publco','$precio_proveedor')";
        $res = $conexion->ejecutar($sql);
        $conexion -> close();
      }catch(Exception $e){
        $e -> getMessage();
      }
    }
  }

 ?>
