<?php
session_start( );

$connectDataBase= mysqli_connect('localhost','root','','login');

$email = $_POST['email'];
$clave = $_POST['clave'];
$nivel = $_GET['nivel'];

//Conectamos con la bdd y obtenemos todos los datos del alta para compararlos con los ingresados 
$c = "SELECT NOMBRE, APELLIDO, EMAIL, ID, NIVEL FROM usuarios WHERE EMAIL='$email' AND CLAVE=MD5('$clave') LIMIT 1";
$f = mysqli_query($connectDataBase, $c);
$a = mysqli_fetch_assoc($f);

//Conectamos con bdd y solicitamos el nivel
$getNivel = "SELECT NIVEL FROM usuarios WHERE EMAIL ='$email' AND CLAVE=MD5('$clave') LIMIT 1";
$connectForNivel = mysqli_query($connectDataBase, $getNivel);
$fetchForNivel = mysqli_fetch_assoc($connectForNivel);

if( $a == NULL ){
	header("Location: index.php?login=error");
}else{
	
	$_SESSION = $a;
	
	//Validacion de user/admin
	if ($fetchForNivel['NIVEL'] == 'usuario') {
		header("Location: ./inventario/inventario.php");
	  } else {
		header("Location: ./ABM/productos.php");		
	  }
	  
	
}



?>