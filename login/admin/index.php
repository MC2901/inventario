<?php
session_start();

if (!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'Admin') {

	die('NO TENES PERMISOS');

}


$connectDB = mysqli_connect('localhost', 'root', '', 'login');

$queryDB = "SELECT ID,NIVEL, IFNULL(NOMBRE, '----') AS NOMBRE, ESTADO, IFNULL(APELLIDO, '----') AS APELLIDO, EMAIL, DATE_FORMAT( FECHA_ALTA, '%d/%m/%Y' ) AS FECHA FROM usuarios ORDER BY FECHA_ALTA DESC";
$result = mysqli_query($connectDB, $queryDB);

?>

<table border="1">
	<tr>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>EMAIL</th>
		<th>NIVEL</th>
		<th>FECHA</th>
		<th>ESTADO</th>
		<th>BOTONES</th>
	</tr>
	<?php
	while ($fetchAssocDB = mysqli_fetch_assoc($result)) {

		echo '<tr>';
		echo '<td>' . $fetchAssocDB['NOMBRE'] . '</td>';
		echo '<td>' . $fetchAssocDB['APELLIDO'] . '</td>';
		echo '<td>' . $fetchAssocDB['EMAIL'] . '</td>';
		echo '<td>' . $fetchAssocDB['NIVEL'] . '</td>';
		echo '<td>' . $fetchAssocDB['FECHA'] . '</td>';
		echo '<td>' . $fetchAssocDB['ESTADO'] . '</td>';
		echo '<td>';

		if ($fetchAssocDB['ESTADO'] == 'activo') {
			echo '<a href="bannear.php?id=' . $fetchAssocDB['ID'] . '">BANNEAR</a>';
		} else {

			echo '<a href="no_bannear.php?id=' . $fetchAssocDB['ID'] . '">ACTIVAR</a>';

		}
		echo ' | ';

		if ($fetchAssocDB['NIVEL'] == 'usuario') {
			echo '<a href="adminizar.php?id=' . $fetchAssocDB['ID'] . '">HACER ADMIN</a>';
		} else {
			echo '<a href="no_adminizar.php?id=' . $fetchAssocDB['ID'] . '">HACER USUARIO</a>';
		}

		echo '</td>';
		echo '</tr>';

	}
	?>
</table>