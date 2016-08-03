<?php
	include('conexion.php');
	include('errors.php');
	#echo "Hola"
	$error = '';
	$conexion = new conexion();
	try{
		$conexion->conectar();
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			$sql = "SELECT * FROM usuarios WHERE usuario = '".$username."' AND password = '".$password."'";
			$result = $conexion->ejecutar($sql);
			if($row = mysql_fetch_array($result) > 0){
				session_start(); //Iniciamos la sesion
				$_SESSION['loggedin'] = true;
		 		$_SESSION['username'] = $username;
					header('Location: ../html/inicio.php');
			}else{
				$error = "Usuario o contrasenia incorrectos";
				header('Location: ../html/login.php');
				$conexion->close();
			}
		}
	}catch(Exception $e){
		echo $e->getMessage();
	}
 ?>
