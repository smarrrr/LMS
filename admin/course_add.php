<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$code = $_POST['code'];
		$name = $_POST['name'];
		
		$sql = "INSERT INTO course (code, name) VALUES ('$code', '$name')";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Course added successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: course.php');

?>