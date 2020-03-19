<?php
require('db_connector.inc.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM film WHERE film_ID=$id"; 
$result = mysqli_query($mysqli,$query) or die ( mysqli_error());
header("Location: Programm.php"); 
?>