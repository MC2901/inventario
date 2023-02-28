<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
	print "<h1>ABM - Categorias</h1>";

	//guardo los datos de conexion
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');
	//guardo la consulta que quiero hacerle a la base de datos
	$queryDB = "SELECT idCategoria, categoria FROM categorias";
	//guardo el resultado de la consulta de base de datos
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<table border='1'>";
		print "<caption>Categorias</caption>";
		print "
				<tr>
					<th>Categorias</th>
					<th>Modificar</th>
					<th>Borrar</th>
				</tr>
		";
		//divide el resultado
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<tr>";
			print "<td><a href='productos.php?categoria=$rowDB[idCategoria]&&nombre=$rowDB[categoria]'> $rowDB[categoria] </a></td>";
			print "<td><a href='modCategoria.php?categoria=$rowDB[idCategoria]'> Mod</a></td>";
			print "<td><a href='borCategoria.php?categoria=$rowDB[idCategoria]&&nombre=$rowDB[categoria]'> Bor </a></td>";

			print "</tr>";
		}

		print "</table>";

	} else {
		print "<h1>Algo se rompio</h1>";
	}

} else {

	print "<h1>No ta funkando</h1>";
}

?>

<form action="altaCategoria.php" method="post">
	<label for="categoria">Nueva Categoria</label>
	<input type="text" id="categoria" name="categoria" />
	<input type="submit" value="Crear Categoria">
</form>