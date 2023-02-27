<?php
session_start();

if( !isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'Admin' ){

		die( 'NO TENES PERMISOS' );

}


$connectDataBase= mysqli_connect('localhost','root','','login');

$c = "SELECT ID,NIVEL, IFNULL(NOMBRE, '----') AS NOMBRE, ESTADO, IFNULL(APELLIDO, '----') AS APELLIDO, EMAIL, DATE_FORMAT( FECHA_ALTA, '%d/%m/%Y' ) AS FECHA FROM usuarios ORDER BY FECHA_ALTA DESC";
$r = mysqli_query($connectDataBase, $c);

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
	while($a = mysqli_fetch_assoc($r)){
	
		echo '<tr>';
		echo '<td>'.$a['NOMBRE'].'</td>';
		echo '<td>'.$a['APELLIDO'].'</td>';
		echo '<td>'.$a['EMAIL'].'</td>';
		echo '<td>'.$a['NIVEL'].'</td>';
		echo '<td>'.$a['FECHA'].'</td>';
		echo '<td>'.$a['ESTADO'].'</td>';
		echo '<td>';
		
		if( $a['ESTADO'] == 'activo' ){
			echo '<a href="bannear.php?id='.$a['ID'].'">BANNEAR</a>';
		}else{
		
			echo '<a href="no_bannear.php?id='.$a['ID'].'">ACTIVAR</a>';
		
		}
		echo ' | ';
		
		if( $a['NIVEL'] == 'usuario' ){
			echo '<a href="adminizar.php?id='.$a['ID'].'">HACER ADMIN</a>';
		}else{
			echo '<a href="no_adminizar.php?id='.$a['ID'].'">HACER USUARIO</a>';
		}
			
		echo '</td>';
		echo '</tr>';
	
	}


?>
	
	
	
</table>