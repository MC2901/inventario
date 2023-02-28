<link rel="stylesheet" type="text/css" href="../css/portada.css">
</link>
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
	//guardo los datos de conexion
	if (isset($_GET['categoria'])) {
		$categoryCode = $_GET['categoria'];
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
		//Con esta consulta traigo la categoria actual comparando el id de la categoria con la variable codigo para filtrar
		$queryDBProduct = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto FROM productos WHERE categoriaProducto=$categoryCode";
		$queryDBCategory = "SELECT categoria, idCategoria FROM categorias WHERE idCategoria=$categoryCode";


		print "<section class='portada'>";

		//guardo la consulta que quiero hacerle a la base de datos
		//traer el nombre de la categoria
		if ($result = mysqli_query($connectionDB, $queryDBCategory)) {
			while ($rowDB = mysqli_fetch_array($result)) {
				print "<h1>$rowDB[categoria]</h1>";
			}
		}

		print "<div class='productos'>";
		//guardo el resultado de la consulta de base de datos
		if ($result = mysqli_query($connectionDB, $queryDBProduct)) {

			//divide el resultado
			while ($rowDB = mysqli_fetch_array($result)) {

				print "<div class='producto'>";
				print "<h2><a href=ficha.php?categoria=$rowDB[codigoProducto]>$rowDB[nombreProducto]</a></h2>";
				print "<p>Precio: $rowDB[precioProducto]</p>";
				print "<p>Descripcion: $rowDB[descripcionProducto]</p>";
				print "</div>";
			}

			print "</div>";
		} else {
			print "<h1>Algo se rompio</h1>";
		}

	}
	print "</section>";

} else {

	print "<h1>Algo se rompio</h1>";
}
?>