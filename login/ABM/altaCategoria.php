<?php
//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nameCategory de la base de datos)

if (mysqli_connect('localhost', 'root', '', 'login')) {

	if (isset($_POST['categoria'])) {
		$nameCategory= $_POST['categoria'];

		//guardo los datos de conexion
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		//guardo la consulta que quiero hacerle a la base de datos
		$queryDB = "INSERT INTO categorias (categoria) VALUE ('$nameCategory')";

		//guardo el resultado de la consulta de base de datos
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			print "<h1>Se agregó la categoria $nameCategory </h1>";
			print "<p><a href='index.php'>Inicio</a></p>";

		}

	} else {
		print "<h1>Algo se rompio</h1>";
	}

}

?>