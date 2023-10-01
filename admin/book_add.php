<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$publish_date = $_POST['publish_date'];
		$Reg_date = $_POST['Reg_date'];
		$language= $_POST['language'];
		$pages = $_POST['pages'];
		$price = $_POST['price'];
		$edition= $_POST['edition'];
		$filename = $_FILES['photo']['name'];
		$sql = "INSERT INTO book (isbn, category_id, title, author, publisher, publish_date, Reg_date, pages, language, price, edition, photo) VALUES ('$isbn', '$category', '$title', '$author', '$publisher', '$publish_date', NOW(), '$pages', '$language', '$price', '$edition','$filename')";
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		if($connection->query($sql)){
			$_SESSION['success'] = 'Book added successfully';
		}
		else{
			$_SESSION['error'] = $connection->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: book.php');

?>