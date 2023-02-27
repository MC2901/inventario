<?php

if (mysqli_connect('localhost', 'root', '', 'login')) {
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)

	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$codigo = $_GET['categoria'];
		$nombre = $_GET['nombre'];

		$con = mysqli_connect('localhost', 'root', '', 'login');
		//guardo los datos de conexion

		
		$consultaProductos = "DELETE FROM productos WHERE categoriaProducto='$codigo'";
		//Elimina productos
		if ($resultadoProductos = mysqli_query($con, $consultaProductos)) {
			$consulta = "DELETE FROM categorias WHERE idCategoria='$codigo'";
			if ($resultado = mysqli_query($con, $consulta)) {
				print "<h1>La categoria $nombre fue Eliminada :C </h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
			}
		}

	} else {
		print "<h1>Algo se rompio</h1>";
	}

}

?>