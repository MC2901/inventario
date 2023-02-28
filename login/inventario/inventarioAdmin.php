<link rel="stylesheet" type="text/css" href="../css/inventarioAdmin.css">
</link>
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
	print "<section class='inventarioAdmin'>";
	print "<h1>Categoría de productos</h1>";

	//guardo los datos de conexion
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	$queryDB = "SELECT idCategoria, categoria FROM categorias";

	//guardo la consulta que quiero hacerle a la base de datos
	//guardo el resultado de la consulta de base de datos
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<ul>";
		//divide el resultado
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<li>";
			print "<a href=portada.php?categoria=$rowDB[idCategoria]> $rowDB[categoria] </a>";
			print "</li>";
		}

		print "</ul>";
		print "<div class='buttons'>";
		print "<button onclick=\"location.href='../ABM/productos.php'\">ABM Producto</button>";
		print "<button onclick=\"location.href='../ABM/index.php'\">ABM Categoria</button>";
		print "</div>";
		print "</section>";
	} else {
		print "<h1>Algo se rompio</h1>";
	}

} else {

	print "<h1>Algo se rompio</h1>";
}

?>