<?php
//Archivo de conexión a la base de datos
include('conexion.php');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

$conect = new conexion();
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {
  $sql="SELECT * FROM productos WHERE Nombre LIKE '%$consultaBusqueda%'";
  $res = $conect->ejecutar($sql);
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysql_num_rows($res);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay productos con ese nombre</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
    $mensaje .= "
    <table>
    <thead>
    <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>STOCK</th>
    <th>GANANCIAS</th>
    <th>PRECIO PUBLICO</th>
    <th>PRECIO PROVEEDOR</th>
    <th>Opciones</th>
    </tr>
    </thead>
    <tbody>";
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($row = mysql_fetch_row($res)) {
		    //Output
        $mensaje .="
        <tr>
        <td data-label='id'>$row[0]</td>
        <td data-label='nombre'>$row[1]</td>
        <td data-label='stock'>$row[2]</td>
        <td data-label='ganancias'>$row[3]</td>
        <td data-label='precio_publico'>$row[4]</td>
        <td data-label='precio_proveedor'>$row[5]</td>
        <td><button name='btn_delete' id = 'btn_delete' data-id3='$row[0]'><span class='icon-cross'></span> </button></td>
        </tr>";
		};//Fin while $resultados
    $mensaje.="
    </tbody>
    </table>";
	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
