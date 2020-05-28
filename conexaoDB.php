<?php
//DATABSE CONNECTION (provavelmente não será usado)
$connection = mysqli_connect('localhost', 'root', '', 'bd_fa');  
if(!$connection) {
	die("Database connection failed");
}
?>