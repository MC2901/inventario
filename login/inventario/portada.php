<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	
	
	
	if(isset($_GET['categoria'])){
		$codigo = $_GET['categoria'];
		$con = mysqli_connect('localhost','root','','login');
		//guardo los datos de conexion
		$consulta = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto FROM productos WHERE categoriaProducto=$codigo";
		//Con esta consulta traigo la categoria actual comparando el id de la categoria con la variable codigo para filtrar
		$consultaCat = "SELECT categoria, idCategoria FROM categorias WHERE idCategoria=$codigo";
		
		//guardo la consulta que quiero hacerle a la base de datos
		

		//traer el nombre de la categoria
		if($resultado = mysqli_query($con, $consultaCat)){
			while($fila = mysqli_fetch_array($resultado) ){
				print "<h1>$fila[categoria]</h1>";
			}
		}
	
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la consulta de base de datos
			
			while($fila = mysqli_fetch_array($resultado) ){
					//divide el resultado
		
					print "<div>";
						print "<h2><a href=ficha.php?categoria=$fila[codigoProducto]>$fila[nombreProducto]</a></h2>";
						print "<p>Precio: $fila[precioProducto]</p>";
						print "<p>Descripcion: $fila[descripcionProducto]</p>";
					print "</div>";
				
			
		}
		
		
			
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
		
		
		
		
		
	}
	
	
	
}else{
	
	print "<h1>No ta funkando</h1>";
}





?>