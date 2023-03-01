<link rel="stylesheet" type="text/css" href="../css/altaProducto.css">
</link>
<section class="altaProducto">
	<?php

	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (mysqli_connect('localhost', 'root', '', 'login')) {

		if (isset($_POST['codigo']) and isset($_POST['nombre']) and isset($_POST['precio']) and isset($_POST['cantidad']) and isset($_POST['desc']) and isset($_POST['detalle']) and isset($_POST['categoria'])) {

			$productNumberCode = $_POST['codigo'];
			$productName = $_POST['nombre'];
			$productPrice = $_POST['precio'];
			$productCant = $_POST['cantidad'];
			$productDescription = $_POST['desc'];
			$productDetail = $_POST['detalle'];
			$productCategory = $_POST['categoria'];

			$time = time();
			move_uploaded_file($_FILES['foto']['tmp_name'], "../fotos/" . $time . '.jpg');
			$productPicture = $time . '.jpg';

			//guardamos los datos de conexion
			$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

			//verificamos si la categoria existe en la base de datos
			$checkCategory = "SELECT idCategoria FROM categorias WHERE categoria='$productCategory'";
			$result = mysqli_query($connectionDB, $checkCategory);

			//si la categoria no existe, la agregamos a la base de datos
			if (mysqli_num_rows($result) == 0) {
				$addCategory = "INSERT INTO categorias (categoria) VALUES ('$productCategory')";
				mysqli_query($connectionDB, $addCategory);

				//obtenemos el id de la categoria recién agregada
				$categoryId = mysqli_insert_id($connectionDB);
			} else {
				$row = mysqli_fetch_assoc($result);
				$categoryId = $row['idCategoria'];
			}

			//guardamos la consulta que queremos hacerle a la base de datos
			$queryDB = "INSERT INTO productos (codigoProducto,nombreProducto,precioProducto,cantidadProducto,fotoProducto,descripcionProducto,detallesProducto,categoriaProducto) VALUE ('$productNumberCode','$productName', '$productPrice', '$productCant','$productPicture', '$productDescription', '$productDetail', '$categoryId')";

			//guardamos el resultado de la consulta de base de datos
			if ($result = mysqli_query($connectionDB, $queryDB)) {
				print "<h1>Se agregó el producto $productName al inventario</h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
			}


		} else {
			print "<h1>Algo se rompió</h1>";
		}

	}

	?>
</section>