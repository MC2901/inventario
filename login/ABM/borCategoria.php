<link rel="stylesheet" type="text/css" href="../css/borCategoria.css">
</link>
<section class="borrarCategoria">
	<?php

	//Conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
			$categoryCode = $_GET['categoria'];
			$categoryName = $_GET['nombre'];
			// Guardo los datos de conexión
			$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

			// Elimina productos
			$queryDBProduct = "DELETE FROM productos WHERE categoriaProducto='$categoryCode'";
			if ($productResult = mysqli_query($connectionDB, $queryDBProduct)) {
				// Elimina categoría
				$queryDBCategory = "DELETE FROM categorias WHERE idCategoria='$categoryCode'";
				if ($result = mysqli_query($connectionDB, $queryDBCategory)) {
					print "<h1>La categoría $categoryName fue eliminada</h1>";
					print "<p><a href='index.php'>Inicio</a></p>";
				}
			} else {
				print "<h1>Error al eliminar los productos de la categoría</h1>";
			}
		} else {
			print "<h1>Algo se rompió</h1>";
		}
	}
	?>
</section>