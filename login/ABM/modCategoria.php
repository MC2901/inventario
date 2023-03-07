<link rel="stylesheet" type="text/css" href="../css/modCategoria.css">
</link>
<section class="modificarCategoria">
	<?php

	// Establecer la conexión a la base de datos.
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		// Obtener el código de categoría a modificar.
		if (isset($_GET['categoria'])) {
			$categoryCode = $_GET['categoria'];
		}

		// Establecer la conexión a la base de datos.
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		// Consultar la categoría a modificar.
		$queryDB = "SELECT idCategoria, categoria FROM categorias WHERE idCategoria='$categoryCode'";

		// Obtener el resultado de la consulta.
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			// Crear un formulario para modificar la categoría.
			print "<form action='modCategoria2.php' method='post'>";
			// Recorrer los resultados de la consulta.
			while ($rowDB = mysqli_fetch_array($result)) {
				// Agregar un campo oculto para enviar el ID de la categoría.
				print "<input  type='hidden' name='id' value=$rowDB[idCategoria] />";
				// Agregar un campo para ingresar el nombre de la categoría.
				print "<input type='text' name='categoria' value='$rowDB[categoria]'/>";
				// Agregar un botón para enviar el formulario.
				print "<input type='submit' class='submit' value='Modificar'/>";
			}

			print "</form>";

		} else {
			// Si hay un error en la consulta, mostrar un mensaje de error.
			print "<h1>Algo se rompio</h1>";
		}

	} else {
		// Si no se pudo establecer la conexión a la base de datos, mostrar un mensaje de error.
		print "<h1>Algo se rompio</h1>";
	}

	?>
</section>