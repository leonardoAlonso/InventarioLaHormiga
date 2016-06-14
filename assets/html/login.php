<?php
// Includes Login Script
include('../php/log.php');
session_start();
if(isset($_SESSION['loggedin'])){
	header("location: ../html/inicio.php");
}else{
	#header("location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<!-- CSS -->
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
		<link rel="stylesheet" href="../css/style_pass.css">

	<!-- javascript -->
</head>
<body>
	<div class='page-container'>
		<h1>Login</h1>
		<form  id ='formlogin' action='../php/log.php' method='post'>
			<input type='text' name='username' class='username' placeholder='Username'/>
			<br>
			<input type="password" name="password" class="password" placeholder="Password"/>
	    	<br>
	        <button name='submit' type='submit'>Sign me in</button>
		</form>
	</div>
</body>
</html>
