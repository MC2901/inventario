<?php

//Inicializacion de variables
if (mysqli_connect('localhost', 'root', '', 'login')) {
	$categoryCode = '';
	$categoryName = '';
	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$categoryCode = $_GET['categoria'];
		$categoryName = $_GET['nombre'];
	}

	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$categoryCode = $_GET['categoria'];
		$categoryName = $_GET['nombre'];
	}

	//guardo los datos de conexion
	$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

	$queryDB = "SELECT codigoProducto, nombreProducto FROM productos WHERE categoriaProducto='$categoryCode'";

	//guardo la consulta que quiero hacerle a la base de datos
	//guardo el resultado de la consulta de base de datos
	if ($result = mysqli_query($connectionDB, $queryDB)) {
		print "<table border='1'>";
		print "<caption>$categoryName</caption>";
		print "
				<tr>
					<th>Productos</th>
					<th>Modificar</th>
					<th>Borrar</th>
				</tr>
		";
		//divide el resultado
		while ($rowDB = mysqli_fetch_array($result)) {
			print "<tr>";
			print "<td> $rowDB[nombreProducto]</td>";
			print "<td><a href='modProducto.php?producto=$rowDB[codigoProducto]'> Mod</a></td>";
			print "<td><a href='borProducto.php?producto=$rowDB[codigoProducto]&&nombre=$rowDB[nombreProducto]'> Bor </a></td>";

			print "</tr>";

		}

		print "</table>";

	} else {
		print "<h1>Algo se rompio</h1>";
	}

} else {

	print "<h1>Algo se rompio</h1>";
}

?>

<form action="altaProducto.php" method="post" enctype="multipart/form-data">


	<p>
		<label for="codigo">Codigo Producto</label>
		<input type="text" id="codigo" name="codigo" />
	</p>

	<p>
		<label for="nombre">Nombre Producto</label>
		<input type="text" id="nombre" name="nombre" />
	</p>

	<p>
		<label for="precio">Precio Producto</label>
		<input type="text" id="precio" name="precio" />
	</p>

	<p>
		<label for="cantidad">Cantidad Producto</label>
		<input type="text" id="cantidad" name="cantidad" />
	</p>
	<p>
		<label for="foto">Agregue una Imagen</label>
		<input type="file" accept=".jpg" id="foto" name="foto">
	</p>

	<p>
		<textarea name="desc">Descripcion</textarea>
	</p>

	<p>
		<textarea name="detalle">Detalle</textarea>
	</p>

	<!-- input con la categoriaProducto -->
	<p>
		<input id="categoria" name="categoria" <?php print "value=$categoryCode"; ?> />
	</p>

	<input type="submit" value="Crear Producto">

</form>