<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)

	
	
	if(isset($_GET['producto']) and isset($_GET['nombre'])){
		$codigo = $_GET['producto'];
		$nombre = $_GET['nombre'];
		
		$con = mysqli_connect('localhost','root','','login');
		//guardo los datos de conexion
		
		$consulta = "DELETE FROM productos WHERE codigoProducto='$codigo'";
		//guardo la consulta que quiero hacerle a la base de datos
		
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la consulta de base de datos
				print "<h1>La producto $nombre fue Eliminade :C </h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
				
			
		}
		
		
			
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
		
		
		
		
		
	
	
	
	
}




?>