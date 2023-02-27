<?php
session_start( );

if( !isset( $_SESSION['ID'] ) ){
	header("Location: index.php?forbidden=1");
}



var_dump($_SESSION);
/*print "<ul>"
print "<li>". $nombre .  "</li>";
print "</ul>"*/

?>
<a href="logout.php">SALIR</a>