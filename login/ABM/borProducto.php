<!-- Incluimos el archivo de estilo para darle formato a la página -->
<link rel="stylesheet" type="text/css" href="../css/borProducto.css">

<!-- Abrimos la sección que contendrá el código PHP -->
<section class="borrarProducto">
<?php

// Verificamos que se haya realizado la conexión a la base de datos
if (mysqli_connect('localhost', 'root', '', 'login')) {

	// Verificamos que se hayan recibido los parámetros "producto" y "nombre"
	if (isset($_GET['producto']) and isset($_GET['nombre'])) {

		// Guardamos los valores de los parámetros en variables
		$productCode = $_GET['producto'];
		$productName = $_GET['nombre'];

		// Abrimos una nueva conexión a la base de datos
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		// Preparamos la consulta SQL para eliminar el producto
		$queryDB = "DELETE FROM productos WHERE codigoProducto='$productCode'";

		// Ejecutamos la consulta y guardamos el resultado en una variable
		if ($result = mysqli_query($connectionDB, $queryDB)) {

			// Si la consulta se ejecutó correctamente, mostramos un mensaje de confirmación
			print "<h1>El producto $productName fue eliminado</h1>";
			print "<p><a href='index.php'>Inicio</a></p>";

		}

	} else {

		// Si no se recibieron los parámetros correctamente, mostramos un mensaje de error
		print "<h1>Algo se rompió</h1>";

	}

}

?>
<!-- Cerramos la sección -->
</section>
