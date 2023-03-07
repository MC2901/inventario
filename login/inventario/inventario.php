<link rel="stylesheet" type="text/css" href="../css/inventario.css">
</link>
<section class="inventario">
<?php

// Conexión a la base de datos con 4 parámetros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
	print "<h1>Lista de productos</h1>";

	// Guardo los datos de conexión a la base de datos
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	$queryDB = "SELECT idCategoria, categoria FROM categorias";

	// Realizo la consulta a la base de datos y guardo el resultado
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<ul>";
		
		// Recorro los resultados de la consulta
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<li>";
			print "<a href=portada.php?categoria=$rowDB[idCategoria]> $rowDB[categoria] </a>"; // Muestro la categoría en un link
			print "</li>";
		}

		print "</ul>";

	} else {
		print "<h1>Algo se rompió</h1>";
	}

} else {
	print "<h1>Algo se rompió</h1>";
}

?>
</section>