<?php

$connnectDB = mysqli_connect('localhost', 'root', '', 'login');

$email = $_POST['email'];
$password = $_POST['clave'];
$name = $_POST['nombre'];
$surname = $_POST['apellido'];

$queryDB = <<<ALGO
	INSERT INTO 
		usuarios 
	SET 
		NOMBRE='$name',
		APELLIDO='$surname',
		EMAIL='$email', 
		CLAVE=MD5('$password'),
		NIVEL='usuario',
		FECHA_ALTA=NOW( )
ALGO;

mysqli_query($connnectDB, $queryDB);
header("Location: index.php?alta=ok");

?>