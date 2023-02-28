<link rel="stylesheet" type="text/css" href="../css/borProducto.css">
</link>
<section class="borrarProducto">
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {

	if (isset($_GET['producto']) and isset($_GET['nombre'])) {
		$productCode = $_GET['producto'];
		$productName = $_GET['nombre'];

		//guardo los datos de conexion
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		//guardo la consulta que quiero hacerle a la base de datos
		$queryDB = "DELETE FROM productos WHERE codigoProducto='$productCode'";

		//guardo el resultado de la consulta de base de datos
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			print "<h1>El producto $productName fue eliminado</h1>";
			print "<p><a href='index.php'>Inicio</a></p>";

		}

	} else {
		print "<h1>Algo se rompio</h1>";
	}

}

?>
</section>