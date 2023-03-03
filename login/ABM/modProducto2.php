<link rel="stylesheet" type="text/css" href="../css/modProducto2.css">
</link>
<section class="modificarProducto">
	<?php

	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		if (isset($_POST['codigo']) and isset($_POST['nombre']) and isset($_POST['precio']) and isset($_POST['cantidad']) and isset($_POST['desc']) and isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
			$productCode = $_POST['codigo'];
			$productName = $_POST['nombre'];
			$productPrice = $_POST['precio'];
			$productCant = $_POST['cantidad'];
			$productDescription = $_POST['desc'];
			$productDetail = $_POST['detalle'];

			$tmp_name = $_FILES['foto']['tmp_name'];
			$name = basename($_FILES['foto']['name']);
			move_uploaded_file($tmp_name, '../fotos/' . $name);
			$productPicture = $name;

			//guardo los datos de conexion
			$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

			//guardo la consulta que quiero hacerle a la base de datos
			$queryDB = "UPDATE productos SET nombreProducto='$productName', precioProducto='$productPrice', cantidadProducto='$productCant', descripcionProducto='$productDescription', detallesProducto='$productDetail', fotoProducto='$productPicture' WHERE codigoProducto='$productCode'";

			//guardo el resultado de la consulta de base de datos
			if ($result = mysqli_query($connectionDB, $queryDB)) {
				print "<h1>El producto $productName fue modificado</h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
			}

		} else {
			print "<h1>Algo se rompio</h1>";
		}

	}

	?>
</section>