<?php 
	include 'session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM course WHERE id = '$id'";
		$query = $connection->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>