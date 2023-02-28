<?php
session_start( );

$connectionDB= mysqli_connect('localhost','root','','login');

$email = $_POST['email'];
$password = $_POST['clave'];

//Conectamos con la bdd y obtenemos todos los datos del alta para compararlos con los ingresados 
$queryDB = "SELECT NOMBRE, APELLIDO, EMAIL, ID, NIVEL FROM usuarios WHERE EMAIL='$email' AND CLAVE=MD5('$password') LIMIT 1";
$result = mysqli_query($connectionDB, $queryDB);
$fetchAssocDB= mysqli_fetch_assoc($result);

//Conectamos con bdd y solicitamos el nivel
$queryDBLevel = "SELECT NIVEL FROM usuarios WHERE EMAIL ='$email' AND CLAVE=MD5('$password') LIMIT 1";
$connectForLevel = mysqli_query($connectionDB, $queryDBLevel);
$fetchForLevel = mysqli_fetch_assoc($connectForLevel);

if( $fetchAssocDB == NULL ){
	header("Location: index.php?login=error");
}else{
	
	$_SESSION = $fetchAssocDB;
	
	//Validacion de user/admin
	if ($fetchForLevel['NIVEL'] == 'usuario') {
		header("Location: ./inventario/inventario.php");
	  } else {
		header("Location: ./inventario/inventarioAdmin.php");		
	  }
	  
	
}



?>