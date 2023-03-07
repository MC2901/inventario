<link rel="stylesheet" type="text/css" href="../css/portada.css">
</link>
<?php

// Conexión a la base de datos con 4 parámetros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {

	// Verifica si la variable GET "categoria" está definida y la guarda en la variable $categoryCode
	if (isset($_GET['categoria'])) {
		$categoryCode = $_GET['categoria'];
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
		// Consulta para traer la categoría actual comparando el id de la categoría con la variable código para filtrar
		$queryDBProduct = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto FROM productos WHERE categoriaProducto=$categoryCode";
		$queryDBCategory = "SELECT categoria, idCategoria FROM categorias WHERE idCategoria=$categoryCode";

		// Imprime la sección de portada
		print "<section class='portada'>";

		// Consulta para traer el nombre de la categoría
		if ($result = mysqli_query($connectionDB, $queryDBCategory)) {
			while ($rowDB = mysqli_fetch_array($result)) {
				print "<h1>$rowDB[categoria]</h1>";
			}
		}

		// Imprime la sección de productos
		print "<div class='productos'>";

		// Consulta para traer el resultado de la base de datos y filtrar por categoría
		if ($result = mysqli_query($connectionDB, $queryDBProduct)) {

			// Divide el resultado y muestra la información de cada producto
			while ($rowDB = mysqli_fetch_array($result)) {

				print "<div class='producto'>";
				print "<h2><a href=ficha.php?categoria=$rowDB[codigoProducto]>$rowDB[nombreProducto]</a></h2>";
				print "<p>Precio: $rowDB[precioProducto]</p>";
				print "<p>Descripcion: $rowDB[descripcionProducto]</p>";
				print "</div>";
			}

			print "</div>";
		} else {
			print "<h1>Algo se rompió</h1>";
		}

	}

	// Cierra la sección de portada
	print "</section>";

} else {

	// Imprime un mensaje de error si la conexión a la base de datos falló
	print "<h1>Algo se rompió</h1>";
}

?>