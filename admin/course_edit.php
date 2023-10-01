<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$name = $_POST['name'];

		$sql = "UPDATE course SET code = '$code', name = '$name' WHERE id = '$id'";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:course.php');

?>