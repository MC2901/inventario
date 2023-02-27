<?php

if (mysqli_connect('localhost', 'root', '', 'login')) {
	//Inicializacion de variables
	$codigo = '';
	$nombre = '';
	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$codigo = $_GET['categoria'];
		$nombre = $_GET['nombre'];
	}

	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
		$codigo = $_GET['categoria'];
		$nombre = $_GET['nombre'];
	}

	$con = mysqli_connect('localhost', 'root', '', 'login');
	//guardo los datos de conexion

	$consulta = "SELECT codigoProducto, nombreProducto FROM productos WHERE categoriaProducto='$codigo'";


	//guardo la consulta que quiero hacerle a la base de datos
	if ($resultado = mysqli_query($con, $consulta)) {
		//guardo el resultado de la consulta de base de datos
		print "<table border='1'>";
		print "<caption>$nombre</caption>";
		print "
				<tr>
					<th>Productos</th>
					<th>Modificar</th>
					<th>Borrar</th>
				</tr>
		";
		while ($fila = mysqli_fetch_array($resultado)) {
			//divide el resultado
			print "<tr>";
			print "<td> $fila[nombreProducto]</td>";
			print "<td><a href='modProducto.php?producto=$fila[codigoProducto]'> Mod</a></td>";
			print "<td><a href='borProducto.php?producto=$fila[codigoProducto]&&nombre=$fila[nombreProducto]'> Bor </a></td>";

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


	<p>
		<!-- input con la categoriaProducto -->
		<input id="categoria" name="categoria" <?php print "value=$codigo"; ?> />
	</p>




	<input type="submit" value="Crear Producto">


</form>