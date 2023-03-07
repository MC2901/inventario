<link rel="stylesheet" type="text/css" href="../css/altaCategoria.css">
</link>
<section class="altaCategoria">
	<?php
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nameCategory de la base de datos)
	
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		// Verifico si se recibió el parámetro 'categoria' a través del método POST.
		if (isset($_POST['categoria'])) {
			$nameCategory = $_POST['categoria'];

			// Guardo los datos de conexión.
			$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

			// Defino la consulta SQL para insertar la nueva categoría.
			$queryDB = "INSERT INTO categorias (categoria) VALUE ('$nameCategory')";

			// Ejecuto la consulta y almaceno el resultado.
			if ($result = mysqli_query($connectionDB, $queryDB)) {
				print "<h1>Se agregó la categoria $nameCategory </h1>";
				print "<p><a href='index.php'>Inicio</a></p>";

			}

		} else {
			print "<h1>Algo se rompio</h1>";
		}

	}

	?>
</section>