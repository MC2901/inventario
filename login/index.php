<?php
session_start( );
?>

<style>
form{ float: left; width: 45%;}
</style>
<h1>Inventario</h1>
<?php

if( isset($_GET['alta'])){
	echo 'Logueado correctamente';
}
if( isset($_GET['login'])){
	echo '<strong style="color: red">Usuario o clave incorrecto</strong>';
}
var_dump($_SESSION);
?>
<form method="post" action="login.php">
	<h2>LOGIN</h2>
	<div><input type="email" placeholder="Dame tu email" name="email" /></div>
	<div><input type="password" placeholder="Dame tu clave" name="clave" /></div>
	<div><input type="submit" value="Entrar!" /></div>	
</form>
<form method="post" action="alta.php">
	<h2>ALTA</h2>
	<div><input type="text" placeholder="Nombre" name="nombre" require/></div>
	<div><input type="text" placeholder="Apellido" name="apellido" require/></div>
	<div><input type="email" placeholder="Dame tu email" name="email" require/></div>
	<div><input type="password" placeholder="Dame tu clave" name="clave" require/></div>
	<div><input type="submit" value="Dame de alta!" /></div>
</form>