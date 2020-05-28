<?php
//DATABSE CONNECTION
$connection = mysqli_connect('https://br78.hostgator.com.br:2083', 'felic009_lks', 'Oigalera123', 'felic009_bd_fa');  
if(!$connection) {
	die("Database connection failed");
}
?>