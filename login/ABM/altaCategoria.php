<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)

	
	
	if(isset($_POST['categoria'])){
		$nombre = $_POST['categoria'];
		
		$con = mysqli_connect('localhost','root','','login');
		//guardo los datos de conexion
		
		$consulta = "INSERT INTO categorias (categoria) VALUE ('$nombre')";
		//guardo la consulta que quiero hacerle a la base de datos
		
		if($resultado = mysqli_query($con, $consulta)){
			//guardo el resultado de la consulta de base de datos
				print "<h1>La categoria $nombre fue AGREGADA!!!</h1>";
				print "<p><a href='index.php'>Inicio</a></p>";
				
			
		}
		
		
			
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
		
		
		
		
		
	
	
	
	
}




?>