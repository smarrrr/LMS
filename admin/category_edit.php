<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Category updated successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:category.php');

?>