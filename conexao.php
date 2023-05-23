<?php
	
	$username = 'root';
	$password = '';
	$database = 'pesquisa_db';
	$host = 'localhost';
	
	$mysqli = new mysqli($host, $username, $password, $database);
	
	if($mysqli->error) {
		die("Failed to connect to the database" . $msqli->error);
	}
	
?>