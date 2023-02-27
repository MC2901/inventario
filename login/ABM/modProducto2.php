<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)

	
	
	if(isset($_POST['codigo'])and isset($_POST['nombre']) and isset($_POST['precio'])  and isset($_POST['cantidad']) and isset($_POST['desc']) and isset($_POST['detalle']) ){
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$desc = $_POST['desc'];
		$detalle = $_POST['detalle'];
		
	
		$con = mysqli_connect('localhost','root','','login');
		//guardo los datos de conexion
		
		$consulta = "UPDATE productos SET nombreProducto='$nombre', precioProducto='$precio', cantidadProducto='$cantidad', descripcionProducto='$desc', detallesProducto='$detalle' WHERE codigoProducto='$codigo'";
		//guardo la consulta que quiero hacerle a la base de datos
		
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la consulta de base de datos
				print "<h1>El producto $nombre fue Modificado!!!</h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
				
			
		}
		
		
			
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
		
		
		
		
		
	
	
	
	
}




?>