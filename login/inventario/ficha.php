<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	print "<h1>Ficha</h1>";
	
	
	if(isset($_GET['categoria'])){
		$codigo = $_GET['categoria'];
		
		$con = mysqli_connect('localhost','root','','login');
		//guardo los datos de conexion
		$consulta = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto, cantidadProducto, fotoProducto,detallesProducto FROM productos WHERE codigoProducto=$codigo";
		//guardo la consulta que quiero hacerle a la base de datos
		
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la consulta de base de datos
				while($fila = mysqli_fetch_array($resultado) ){
					//divide el resultado
					print "<div>";
						print "<h2>$fila[nombreProducto]</h2>";
						print "<p>Precio: $fila[precioProducto]</p>";
						print "<p>Descripcion: $fila[descripcionProducto]</p>";
						print "<p>Stock: $fila[cantidadProducto]</p>";
						print "<p>Detalle: $fila[detallesProducto]</p>";
						print "<img src=fotos/$fila[fotoProducto] />";
					print "</div>";
				
			
		}
		
		
			
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
		
		
		
		
		
	}
	
	
	
}else{
	
	print "<h1>Algo se rompio</h1>";
}




?>