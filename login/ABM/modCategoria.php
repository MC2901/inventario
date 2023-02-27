<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	
		
		if(isset($_GET['categoria'])){
		$codigo = $_GET['categoria'];
		}
	
	$con = mysqli_connect('localhost','root','','login');
	//guardo los datos de conexion
	$consulta = "SELECT idCategoria, categoria FROM categorias WHERE idCategoria='$codigo'";
		//guardo la consulta que quiero hacerle a la base de datos
	if($resultado = mysqli_query($con, $consulta)){
		//guardo el resultado de la consulta de base de datos
		print "<form action='modCategoria2.php' method='post'>";
		while($fila = mysqli_fetch_array($resultado) ){
			//divide el resultado
			print "<input  type='hidden' name='id' value=$fila[idCategoria] />";
			
			print "<input type='text' name='categoria' value='$fila[categoria]'/>";
			
			print "<input type='submit' value='Modificar'/>";
			
			
		}
		
		
		print "</form>";
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
	
	
}else{
	
	print "<h1>Algo se rompio</h1>";
}




?>