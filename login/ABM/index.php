<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<link rel="stylesheet" type="text/css" href="../css/ABMCategorias.css">
</link>
<section class="ABMCategoria">
	<?php

	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (mysqli_connect('localhost', 'root', '', 'login')) {
		print "<h1>ABM - Categorias</h1>";

		// Guarda los datos de conexion
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
		// Guarda la consulta que se quiere hacer a la base de datos
		$queryDB = "SELECT idCategoria, categoria FROM categorias";
		// Guarda el resultado de la consulta de base de datos
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			print "<table border='1'>";
			// Enlace a la página de Categorías
			print "<p><a href='../inventario/inventarioAdmin.php'>Categorias</a></p>";
			// Divide el resultado
			while ($rowDB = mysqli_fetch_array($result)) {
				print "<tr>";
				// Enlace a la página de productos con idCategoria y nombre de la categoría como parámetros
				print "<td><a href='productos.php?categoria=$rowDB[idCategoria]&&nombre=$rowDB[categoria]'> $rowDB[categoria] </a></td>";
				// Enlace a la página de modificación de categorías con idCategoria como parámetro
				print "<td><a href='modCategoria.php?categoria=$rowDB[idCategoria]'> Modificar</a></td>";
				// Enlace a la página de borrado de categorías con idCategoria y nombre de la categoría como parámetros
				print "<td><a href='borCategoria.php?categoria=$rowDB[idCategoria]&&nombre=$rowDB[categoria]'> Borrar </a></td>";

				print "</tr>";
			}

			print "</table>";

		} else {
			// Mensaje de error en caso de que algo falle en la consulta
			print "<h1>Algo se rompio</h1>";
		}

	} else {
		// Mensaje de error en caso de que falle la conexión a la base de datos
		print "<h1>No ta funkando</h1>";
	}

	?>

	<!-- Formulario para agregar una nueva categoría -->
	<form action="altaCategoria.php" method="post">
		<label for="categoria">Nueva Categoria</label>
		<input type="text" id="categoria" name="categoria" />
		<input class="submit" type="submit" value="Crear Categoria">
	</form>
</section>