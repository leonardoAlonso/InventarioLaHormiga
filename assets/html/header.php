<?php include('../php/errors.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario la Hormiga</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/estilos.css"charset="utf-8">
	<link rel="stylesheet" href="../css/fonts.css"charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'/>
	<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'/>
	<link href='https://fonts.googleapis.com/css?family=Dosis:300' rel='stylesheet' type='text/css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="../js/main.js" charset="utf-8"></script>
	<script src="../js/ajax.js" charset="utf-8"></script>
	<script src='https://code.jquery.com/jquery-1.9.1.min.js'></script>

</head>
<body>
	<header class=''>

			<div class="logo">Pirotecnia La Hormiga</div>
			<div class="menu-bar">
				<a href="#" class = "bt-menu"><span class = "icon-menu"></span>Pirotecnia La Hormiga</a>
			</div>
			<nav>
				<ul>
					<li><a href="inicio.php"><span class ="icon-home"></span>Inicio</a></li>

					<li class="submenu">
						<a href="#"><span class = "icon-calendar"></span>Inventario <span class="caret icon-circle-down"></span></a>
						<ul class="children">
							<li><a href="new.php"><span class='icon-plus'></span>Nuevo Producto</a></li>
							<li><a href="eliminar.php"><span class='icon-minus'></span>Eliminar Producto</a></li>
							<li><a href="modificar.php"><span class='icon-pencil'></span>Modificar Producto</a></li>
						</ul>
					</li>

					<li class="cerrar"><a href="../php/logout.php"><span class = "icon-cross"></span>Logout</a></li>
				</ul>
			</nav>

	</header>
