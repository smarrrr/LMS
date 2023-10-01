<?php
	session_start();
	include 'connection.php';

	$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
	$query = $connection->query($sql);
	$user = $query->fetch_assoc();
	
?>