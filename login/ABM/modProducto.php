<link rel="stylesheet" type="text/css" href="../css/modProducto.css">
</link>
<section class="modificarProducto">
	<?php

	// Se verifica la conexión a la base de datos con 4 parámetros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		$productCode = '';

		if (isset($_GET['producto'])) {
			$productCode = $_GET['producto'];
		}

		// Se guarda los datos de conexión
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
		// Se guarda la consulta que se quiere hacerle a la base de datos
		$queryDB = "SELECT * FROM productos WHERE codigoProducto='$productCode'";
		// Se guarda el resultado de la consulta de base de datos
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			// Se muestra un formulario con los datos del producto a modificar
			print "<form action='modProducto2.php' method='post' enctype='multipart/form-data'>";
			// Se divide el resultado obtenido en filas y se muestran los datos del producto en el formulario
			while ($rowDB = mysqli_fetch_array($result)) {
				print "<p><input type='hidden' name='codigo' value=$rowDB[codigoProducto] /></p>";
				print "<p>Nombre</p><input type='text' name='nombre' value='$rowDB[nombreProducto]'/>";
				print "<p>Precio</p><input type='text' name='precio' value='$rowDB[precioProducto]'/>";
				print "<p>Cantidad</p><input type='text' name='cantidad' value='$rowDB[cantidadProducto]'/>";
				print "<p>Descripción</p>
					<textarea name ='desc'>$rowDB[descripcionProducto]</textarea>";
				print "<div class='foto'>
						<label for='foto'>Agregue una Imagen</label>
						<input type='file' id='foto' name='foto'>
					</div>";
				print "<p>Detalles</p>
					<textarea name ='detalle'>$rowDB[detallesProducto]</textarea>";
				print "<p><input type='submit' class='submit' value='Modificar'/></p>";

			}

			print "</form>";

		} else {
			// Se muestra un mensaje de error si la consulta no se realizó correctamente
			print "<h1>Algo se rompió</h1>";
		}

	} else {
		// Se muestra un mensaje de error si no se pudo establecer conexión con la base de datos
		print "<h1>Algo se rompió</h1>";
	}

	?>
</section>