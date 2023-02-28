<?php
$id = $_GET['id'];

$connnectDB= mysqli_connect('localhost','root','','login');


$queryDB = "UPDATE usuarios SET NIVEL='usuario' WHERE ID='$id'";

mysqli_query($connnectDB, $queryDB);
header("Location: index.php");

?>