<?php

if (mysqli_connect('localhost', 'root', '', 'login')) {
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)

	if (isset($_POST['categoria']) and isset($_POST['id'])) {
		$categoryName = $_POST['categoria'];
		$categoryCode = $_POST['id'];

		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
		//guardo los datos de conexion

		$queryDB = "UPDATE categorias SET categoria='$categoryName' WHERE idCategoria='$categoryCode'";
		//guardo la consulta que quiero hacerle a la base de datos

		if ($resultado = mysqli_query($connectionDB, $queryDB)) {
			//guardo el resultado de la consulta de base de datos
			print "<h1>La categoria $categoryName fue modificada</h1>";
			print "<p><a href='index.php'>Inicio</a></p>";

		}

	} else {
		print "<h1>Algo se rompio</h1>";
	}

}

?>