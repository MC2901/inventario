<link rel="stylesheet" type="text/css" href="../css/inventarioAdmin.css">
</link>
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
	// Imprime la sección que contiene la lista de categorías de productos
	print "<section class='inventarioAdmin'>";
	print "<h1>Categoría de productos</h1>";

	// Se establece la conexión a la base de datos
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	// Se guarda la consulta SQL en una variable
	$queryDB = "SELECT idCategoria, categoria FROM categorias";

	// Se ejecuta la consulta SQL y se guarda el resultado en una variable
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		// Imprime la lista de categorías
		print "<ul>";
		while ($rowDB = mysqli_fetch_array($result)) {
			// Imprime cada categoría de la base de datos como un enlace a la página de portada.php con el parámetro "categoria" igual al ID de la categoría
			print "<li>";
			print "<a href=portada.php?categoria=$rowDB[idCategoria]> $rowDB[categoria] </a>";
			print "</li>";
		}

		print "</ul>";
		// Agrega los botones de ABM (Alta, Baja, Modificación) de productos y categorías
		print "<div class='buttons'>";
		print "<button onclick=\"location.href='../ABM/productos.php'\">ABM Producto</button>";
		print "<button onclick=\"location.href='../ABM/index.php'\">ABM Categoria</button>";
		print "</div>";
		print "</section>";
	} else {
		// Si la consulta falla, imprime un mensaje de error
		print "<h1>Algo se rompio</h1>";
	}

} else {
	// Si la conexión a la base de datos falla, imprime un mensaje de error
	print "<h1>Algo se rompio</h1>";
}
?>