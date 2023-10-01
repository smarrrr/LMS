<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$dob = $_POST['dob'];
		$course = $_POST['course'];
		$address= $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$sql = "UPDATE member SET username = '$username', name = '$name', course_id = '$course', sex='$sex', dob='$dob', phone='$phone', email='$email' WHERE id = '$id'";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:student.php');

?>