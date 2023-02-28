<link rel="stylesheet" type="text/css" href="../css/modProducto.css">
</link>
<section class="modificarProducto">
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {

	$productCode= '';

	if (isset($_GET['producto'])) {
		$productCode = $_GET['producto'];
	}

	//guardo los datos de conexion
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	//guardo la consulta que quiero hacerle a la base de datos
	$queryDB = "SELECT * FROM productos WHERE codigoProducto='$productCode'";
	//guardo el resultado de la consulta de base de datos
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<form action='modProducto2.php' method='post'>";
		//divide el resultado
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<p><input type='hidden' name='codigo' value=$rowDB[codigoProducto] /></p>";
			print "<p>Nombre</p><input type='text' name='nombre' value='$rowDB[nombreProducto]'/>";
			print "<p>Precio</p><input type='text' name='precio' value='$rowDB[precioProducto]'/>";
			print "<p>Cantidad</p><input type='text' name='cantidad' value='$rowDB[cantidadProducto]'/>";
			print "<p>Descripción</p>
					<textarea name ='desc'>$rowDB[descripcionProducto]</textarea>";
			print "<p>Detalles</p>
					<textarea name ='detalle'>$rowDB[detallesProducto]</textarea>";
			print "<p><input type='submit' class='submit' value='Modificar'/></p>";

		}

		print "</form>";

	} else {
		print "<h1>Algo se rompio</h1>";
	}

} else {

	print "<h1>Algo se rompio</h1>";
}

?>
</section>