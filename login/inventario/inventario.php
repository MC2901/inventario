<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	print "<h1>Lista de productos</h1>";
	
	$con = mysqli_connect('localhost','root','','login');
	//guardo los datos de conexion
	$consulta = "SELECT idCategoria, categoria FROM categorias";
	
	//guardo la consulta que quiero hacerle a la base de datos
	if($resultado = mysqli_query($con, $consulta)){
		//guardo el resultado de la consulta de base de datos
		print "<ul>";
		while($fila = mysqli_fetch_array($resultado) ){
			//divide el resultado
			print "<li>";
				print "<a href=portada.php?categoria=$fila[idCategoria]> $fila[categoria] </a>";
			print "</li>";
		}
		
		
		print "</ul>";
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
	
	
}else{
	
	print "<h1>Algo se rompio</h1>";
}






?>