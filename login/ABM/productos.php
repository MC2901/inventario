<link rel="stylesheet" type="text/css" href="../css/ABMProductos.css">
</link>
<section class="ABM">
	<?php

	// Inicialización de variables
	if (mysqli_connect('localhost', 'root', '', 'login')) {
		$categoryCode = '';
		$categoryName = '';

		// Obtener valores de la URL (si existen)
		if (isset($_GET['categoria']) and isset($_GET['nombre'])) {
			$categoryCode = $_GET['categoria'];
			$categoryName = $_GET['nombre'];
		}

		// Conexión a la base de datos
		$connectionDB = mysqli_connect('localhost', 'root', '', 'login');

		// Consulta para obtener los productos de la categoría seleccionada
		$queryDB = "SELECT codigoProducto, nombreProducto FROM productos WHERE categoriaProducto='$categoryCode'";

		// Realizar la consulta y mostrar la tabla de productos
		if ($result = mysqli_query($connectionDB, $queryDB)) {
			print "<table border='1'>";
			print "<caption class='nombreCategoria'>$categoryName</caption>";
			print "
			<tr class='titCategoria'>
				<th><a href='../inventario/inventarioAdmin.php'>Productos</a></th>
			</tr>
	";

			// Mostrar cada producto en la tabla
			while ($rowDB = mysqli_fetch_array($result)) {
				print "<tr class='inventario'>";
				print "<td> $rowDB[nombreProducto]</td>";
				print "<td><a href='modProducto.php?producto=$rowDB[codigoProducto]'> Modificar</a></td>";
				print "<td><a href='borProducto.php?producto=$rowDB[codigoProducto]&&nombre=$rowDB[nombreProducto]'> Borrar </a></td>";
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

	<form class="formABM" action="altaProducto.php" method="post" enctype="multipart/form-data">

		<!-- Campos para agregar un nuevo producto -->
		<p class="input">
			<label for="codigo">Codigo Producto</label>
			<input type="text" id="codigo" name="codigo" />
		</p>

		<p class="input">
			<label for="nombre">Nombre Producto</label>
			<input type="text" id="nombre" name="nombre" />
		</p>

		<p class="input">
			<label for="precio">Precio Producto</label>
			<input type="text" id="precio" name="precio" />
		</p>

		<p class="input">
			<label for="cantidad">Cantidad Producto</label>
			<input type="text" id="cantidad" name="cantidad" />
		</p>
		<p class="input">
			<label for="foto">Agregue una Imagen</label>
			<input type="file" accept=".jpg" id="foto" name="foto">
		</p>

		<p class="input">
			<label for="desc">Descripcion</label>
			<textarea name="desc"></textarea>
		</p>

		<p class="input">
			<label for="detalle">Detalle</label>
			<textarea name="detalle"></textarea>
		</p>

		<p class="input desplegable">
			<label class="nombreCategorias" for="categoria">Nombre de categoria</label>
			<select id="categoria" name="categoria">
				<?php
				// Consulta a la base de datos para obtener las categorías existentes
				$queryCategorias = "SELECT idCategoria, categoria FROM categorias";
				$resultCategorias = mysqli_query($connectionDB, $queryCategorias);

				// Imprime cada categoría en el select como una opción
				while ($rowCategoria = mysqli_fetch_array($resultCategorias)) {
					// Verifica si la categoría actual es la que se seleccionó previamente
					$selected = ($rowCategoria['idCategoria'] == $categoryCode) ? 'selected' : '';
					// Imprime la opción
					echo "<option value='{$rowCategoria['categoria']}' $selected>{$rowCategoria['categoria']}</option>";
				}
				?>
			</select>
		</p>


		<input class="submit" type="submit" value="Crear Producto">

	</form>
</section>