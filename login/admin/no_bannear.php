<?php
$id = $_GET['id'];

$connnectDB= mysqli_connect('localhost','root','','login');


$queryDB = "UPDATE usuarios SET ESTADO='activo' WHERE ID='$id'";

mysqli_query($connnectDB, $queryDB);
header("Location: index.php");

?>