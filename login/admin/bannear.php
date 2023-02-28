<?php
$id = $_GET['id'];

$connectDB= mysqli_connect('localhost','root','','login');


$queryDB = "UPDATE usuarios SET ESTADO='banneado' WHERE ID='$id'";

mysqli_query($connectDB, $queryDB);
header("Location: index.php");

?>