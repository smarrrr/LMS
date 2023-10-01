<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$dob = $_POST['dob'];
		$course = $_POST['course'];
		$address= $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating member password
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$password = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO member (username,password, name, sex, dob, course_id, address, phone, email, photo) VALUES ('$username','$password','$name', '$sex', '$dob','$course', '$address', '$phone','$email','$filename')";
		if($connection->query($sql)){
			$_SESSION['success'] = 'Member registered successfully. Your Password is'.' '.$password;
		}
		else{
			$_SESSION['error'] = $connection->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: student.php');
?>