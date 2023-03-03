<?php
// Conectar a la base de datos
$connnectDB = mysqli_connect('localhost', 'root', '', 'login');

// Recoger los datos del formulario
$email = $_POST['email'];
$password = $_POST['clave'];
$name = $_POST['nombre'];
$surname = $_POST['apellido'];

// Verificar si el correo electrónico ya existe en la base de datos
$queryEmail = "SELECT * FROM usuarios WHERE EMAIL='$email'";
$resultEmail = mysqli_query($connnectDB, $queryEmail);

if (mysqli_num_rows($resultEmail) > 0) {
	// El correo electrónico ya existe, redirigir al usuario de vuelta al formulario de alta con un mensaje de error
	header("Location: index.php?error=duplicate_email");
	exit();
}

// Insertar el registro en la base de datos
$queryDB = "INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, FECHA_ALTA) VALUES ('$name', '$surname', '$email', MD5('$password'), 'usuario', NOW())";

if (mysqli_query($connnectDB, $queryDB)) {
	// La inserción se realizó correctamente, redirigir al usuario a la página de inicio
	header("Location: index.php?alta=ok");
	exit();
} else {
	// Ocurrió un error al insertar el registro
	header("Location: index.php?error=db_error");
	exit();
}
?>