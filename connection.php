<?php
	$connection = new mysqli('localhost', 'root', '', 'lacmlms');

	if ($connection->connect_error) {
	    die("Connection failed: " . $connection->connect_error);
	}
	
?>