<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$filename= $_FILES['photo']['name'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$publish_date = $_POST['publish_date'];
		$pages = $_POST['pages'];
		$language = $_POST['language'];
		$price = $_POST['price'];
		$edition = $_POST['edition'];
		$status = $_POST['status'];
		$sql = "UPDATE book SET isbn = '$isbn', title = '$title', category_id = '$category', author = '$author', publisher = '$publisher', publish_date = '$publish_date', pages='$pages', language='$language', price='$price', edition='$edition', status='$status' WHERE id = '$id'";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Book updated successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}
	else{
		$_SESSION['error'] = 'Please fill up the form';
	}

	header('location:book.php');

?>