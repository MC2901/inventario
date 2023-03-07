<?php
session_start(); // Iniciar la sesión
?>

<link rel="stylesheet" type="text/css" href="./css/login.css"> <!-- Enlazar la hoja de estilos -->
</link>

<?php
// Mostrar mensajes según el resultado de la acción del usuario
if (isset($_GET['alta'])) {
	echo '<p class="correct">Registrado correctamente</p>'; // Mensaje de éxito al registrarse
}
if (isset($_GET['login'])) {
	echo '<p class="error">Usuario o clave incorrecto</p>'; // Mensaje de error al iniciar sesión
}
if (isset($_GET['error'])) {
	if ($_GET['error'] == 'duplicate_email') {
		echo '<p class="error">Ya existe un usuario registrado con este correo electrónico.</p>'; // Mensaje de error al intentar registrarse con un correo ya existente
	} else {
		echo '<p class="error">Debes llenar todos los casilleros correctamente.</p>'; // Mensaje de error al no completar todos los campos del formulario
	}
}

?>

<section class="login">
	<form class="form" method="post" action="login.php">
		<h2>LOGIN</h2>
		<input type="email" placeholder="Dame tu email" name="email" />
		<input type="password" placeholder="Dame tu clave" name="clave" />
		<input class="submit" type="submit" value="Iniciar sesión" />
	</form>
	<form class="form" method="post" action="alta.php">
		<h2>ALTA</h2>
		<input type="text" placeholder="Nombre" name="nombre" require />
		<input type="text" placeholder="Apellido" name="apellido" require />
		<input type="email" placeholder="Dame tu email" name="email" require />
		<input type="password" placeholder="Dame tu clave" name="clave" require />
		<input class="submit" type="submit" value="Registrarse" />
	</form>
</section>
