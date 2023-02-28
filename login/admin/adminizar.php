<?php
$id = $_GET['id'];

$connectDB= mysqli_connect('localhost','root','','login');

//Consulta SQL 
$queryDB = "UPDATE usuarios SET NIVEL='Admin' WHERE ID='$id'";

mysqli_query($connectDataBase, $queryDB);
header("Location: index.php");

?>