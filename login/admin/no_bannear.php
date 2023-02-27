<?php
$id = $_GET['id'];

$connectDataBase= mysqli_connect('localhost','root','','login');


$c = "UPDATE usuarios SET ESTADO='activo' WHERE ID='$id'";

mysqli_query($connectDataBase, $c);
header("Location: index.php");

?>