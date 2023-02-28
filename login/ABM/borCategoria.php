<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {

	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$categoryCode = $_GET['categoria'];
		$categoryName = $_GET['nombre'];

		//guardo los datos de conexion
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		
		//Elimina productos
		$queryDBProduct = "DELETE FROM productos WHERE categoriaProducto='$categoryCode'";
		if ($productResult = mysqli_query($connectionDB, $queryDBProduct)) {
			$queryDBCategory = "DELETE FROM categorias WHERE idCategoria='$categoryCode'";
			if ($result = mysqli_query($connectionDB, $queryDBCategory)) {
				print "<h1>La categoria $categoryName fue eliminada</h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
			}
		}

	} else {
		print "<h1>Algo se rompio</h1>";
	}

}

?>