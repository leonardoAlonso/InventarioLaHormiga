<?php
//Archivo de conexión a la base de datos
include('conexion.php');
include('errors.php');

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
		$mensaje = "<p class='wrapper'>No hay productos con ese nombre</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
    $mensaje .= "
    <form action='../php/delete.php' class='wrapper' method='POST'>";
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($row = mysql_fetch_row($res)) {
		    //Output
        $mensaje .="
        Nombre: <input name='nombre' class='find' type = 'text' value='$row[1]'/>
        <br>
        <button type = 'submit' name='btn_delete' id = 'btn_delete' class='buscar'><span class='icon-cross'></span> </button>
        <br/>";
		};//Fin while $resultados
    $mensaje.="
    </form>";
	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
