<?php
session_start();
?>

<link rel="stylesheet" type="text/css" href="./css/login.css">
</link>
<?php

if (isset($_GET['alta'])) {
	echo '<p class="correct">Logueado correctamente</p>';
}
if (isset($_GET['login'])) {
	echo '<p class="error">Usuario o clave incorrecto</p>';
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