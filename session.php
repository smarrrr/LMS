<?php
	session_start();
	include 'connection.php';
	if(isset($_SESSION['member'])){
		$sql = "SELECT * FROM member WHERE id = '".$_SESSION['member']."'";
		$query = $connection->query($sql);
		$member = $query->fetch_assoc();
	}

?>