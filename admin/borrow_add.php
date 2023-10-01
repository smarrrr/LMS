<?php
	include 'session.php';
	if(isset($_POST['add'])){
		$due_date= $_POST['due_date'];
		$member = $_POST['member'];
		
		$sql = "SELECT * FROM member WHERE id = '$member'";
		$query = $connection->query($sql);
		if($query->num_rows < 1){
			if(!isset($_SESSION['error'])){
				$_SESSION['error'] = array();
			}
			$_SESSION['error'][] = 'Member not found';
		}
		else{
			$row = $query->fetch_assoc();
			$member_id = $row['id'];

			$added = 0;
			foreach($_POST['isbn'] as $isbn){
				if(!empty($isbn)){
					$sql = "SELECT * FROM book WHERE isbn = '$isbn' AND status != 1";
					$query = $connection->query($sql);
					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['id'];
						$sql = "INSERT INTO borrow (member_id, book_id, borrow_date) VALUES ('$member_id', '$bid', NOW())";
						if($connection->query($sql)){
							$added++;
							$sql = "UPDATE book SET status = 1 WHERE id = '$bid'";
							$connection->query($sql);
						}
						else{
							if(!isset($_SESSION['error'])){
								$_SESSION['error'] = array();
							}
							$_SESSION['error'][] = $connection->error;
						}

					}
					else{
						if(!isset($_SESSION['error'])){
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = 'Book with book id - '.$id.' unavailable';
					}
		
				}
			}

			if($added > 0){
				$book = ($added == 1) ? 'Book' : 'Books';
				$_SESSION['success'] = $added.' '.$book.' successfully borrowed';
			}

		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: borrow.php');

?>