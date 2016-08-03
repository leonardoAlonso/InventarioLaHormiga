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
    <form action='../php/update.php' class='wrapper' method='POST'>";
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($row = mysql_fetch_row($res)) {
		    //Output
        $mensaje .="
        Nombre: <input name='nombre' class='find' type = 'text' value='$row[1]'/>
        <br>
        Stock: <input name='stock' class='find' type = 'text' value='$row[2]'/>
        <br>
        Entradas: <input name='entradas' onkeypress='return soloNumeros(event);' class='find' value='0' type = 'text'/>
        <br>
        Salidas: <input name='salidas' onkeypress='return soloNumeros(event);' class='find' value='0' type = 'text'/>
        <br>
        Precio Publico: <input name='precio_pubilco' class='find' type = 'text' value='$row[4]'/>
        <br>
        Precio Proveedor: <input name='precio_proveedor' class='find' type = 'text' value='$row[5]'/>
        <br>
        <button type = 'submit' name='btn_mod' id = 'btn_mod' class='buscar'>Modificar</button>
        <br/>";
		};//Fin while $resultados
    $mensaje.="
    </form>";
	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
