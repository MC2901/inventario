<link rel="stylesheet" type="text/css" href="../css/modProducto2.css">
</link>
<section class="modificarProducto">
<?php

// Verificamos que se haya establecido la conexión a la base de datos
if (mysqli_connect('localhost', 'root', '', 'login')) {

	// Verificamos que se hayan enviado los datos del formulario y se hayan cargado correctamente los archivos
	if (isset($_POST['codigo']) and isset($_POST['nombre']) and isset($_POST['precio']) and isset($_POST['cantidad']) and isset($_POST['desc']) and isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
		// Obtenemos los datos del producto a modificar desde el formulario
		$productCode = $_POST['codigo'];
		$productName = $_POST['nombre'];
		$productPrice = $_POST['precio'];
		$productCant = $_POST['cantidad'];
		$productDescription = $_POST['desc'];
		$productDetail = $_POST['detalle'];

		// Obtenemos la imagen del producto desde el formulario y la movemos a la carpeta de fotos
		$tmp_name = $_FILES['foto']['tmp_name'];
		$name = basename($_FILES['foto']['name']);
		move_uploaded_file($tmp_name, '../fotos/' . $name);
		$productPicture = $name;

		// Establecemos la conexión a la base de datos
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		// Realizamos la consulta de actualización en la base de datos
		$queryDB = "UPDATE productos SET nombreProducto='$productName', precioProducto='$productPrice', cantidadProducto='$productCant', descripcionProducto='$productDescription', detallesProducto='$productDetail', fotoProducto='$productPicture' WHERE codigoProducto='$productCode'";

		// Ejecutamos la consulta y verificamos si se realizó con éxito
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			
			// Mostramos un mensaje de éxito y un enlace al inicio
			print "<h1>El producto $productName fue modificado</h1>";
			print "<p><a href='index.php'>Inicio</a></p>";
		}

	} else {
		// Mostramos un mensaje de error en caso de que no se hayan enviado los datos del formulario o no se hayan cargado correctamente los archivos
		print "<h1>Algo se rompio</h1>";
	}

}

?>
</section>