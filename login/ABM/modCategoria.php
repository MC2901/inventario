<link rel="stylesheet" type="text/css" href="../css/modCategoria.css">
</link>
<section class="modificarCategoria">
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {

	if (isset($_GET['categoria'])) {
		$categoryCode = $_GET['categoria'];
	}

	//guardo los datos de conexion
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	//guardo la consulta que quiero hacerle a la base de datos
	$queryDB = "SELECT idCategoria, categoria FROM categorias WHERE idCategoria='$categoryCode'";
	//guardo el resultado de la consulta de base de datos
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<form action='modCategoria2.php' method='post'>";
		//divide el resultado
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<input  type='hidden' name='id' value=$rowDB[idCategoria] />";

			print "<input type='text' name='categoria' value='$rowDB[categoria]'/>";

			print "<input type='submit' class='submit' value='Modificar'/>";


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