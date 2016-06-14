<?php include('header.php');
			include('../php/dao.php');
?>
<?php
	session_start();
	$dao = new DAO();
	if(!isset($_SESSION['username'])){session_destroy();}
	if(is_session_started()){
		echo "<h2>INVENTARIO</h2>";
		echo "<div class='wrapper'>";
		echo "<form  method='POST'>";
		echo "<input type='text' name='nombre' id='busqueda' value='' placeholder='buscar producto' autocomplete='off' onKeyUp='buscar();'class='find'/> ";
		echo "</form>";
		echo "</div>";
		echo "<div id='miDiv' class='wrapper'></div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		$dao -> viewData();
		echo "</section>
					</body>
					</html>";
	} else {
		session_destroy();
		header('location:../../index.html');
	}

	function is_session_started()
	{
		if (php_sapi_name() !== 'cli') {
			if (version_compare(phpversion(),'5.4.0', '>=')) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE:FALSE;
			} else {
				return session_id() === ''?FALSE:TRUE;
			}
		}
	}
 ?>
