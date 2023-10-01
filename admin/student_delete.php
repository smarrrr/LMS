<?php
	include 'session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM member WHERE id = '$id'";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: student.php');
	
?>