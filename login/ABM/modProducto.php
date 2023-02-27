<?php

if(mysqli_connect('localhost','root','','login')){
	//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
	
		
		if(isset($_GET['producto'])){
			$codigo = $_GET['producto'];
		}
	
	$con = mysqli_connect('localhost','root','','login');
	//guardo los datos de conexion
	$consulta = "SELECT * FROM productos WHERE codigoProducto='$codigo'";
		//guardo la consulta que quiero hacerle a la base de datos
	if($resultado = mysqli_query($con, $consulta)){
		//guardo el resultado de la consulta de base de datos
		print "<form action='modProducto2.php' method='post'>";
		while($fila = mysqli_fetch_array($resultado) ){
			//divide el resultado
			
			print "<p><input  type='hidden' name='codigo' value=$fila[codigoProducto] /></p>";
			
			print "<p><input type='text' name='nombre' value='$fila[nombreProducto]'/></p>";
			
			print "<p><input type='text' name='precio' value='$fila[precioProducto]'/></p>";
			
			print "<p><input type='text' name='cantidad' value='$fila[cantidadProducto]'/></p>";
			
			print "<p>Descripcion:</p>
					<textarea name ='desc'>$fila[descripcionProducto]</textarea>";
			
			print "<p>Detalles:</p>
					<textarea name ='detalle'>$fila[detallesProducto]</textarea>";
			
			print "<p><input type='submit' value='Modificar'/></p>";
			
			
		}
		
		
		print "</form>";
		
	}else{
		print "<h1>Algo se rompio</h1>";
	}
	
	
}else{
	
	print "<h1>Algo se rompio</h1>";
}




?>