<?php 
	include 'session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, book.id AS bookid FROM book LEFT JOIN category ON category.id=book.category_id WHERE book.id = '$id'";
		$query = $connection->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>