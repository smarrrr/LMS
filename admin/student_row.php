<?php 
	include 'session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, member.id AS mid FROM member LEFT JOIN course ON course.id=member.course_id WHERE member.id = '$id'";
		$query = $connection->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>