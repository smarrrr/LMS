<?php include 'session.php'; ?>
<?php
	if(!isset($_SESSION['member']) || trim($_SESSION['member']) == ''){
		header('index.php');
	}

	$stuid = $member['id'];
	$sql = "SELECT *,borrow.status AS barstat FROM borrow LEFT JOIN book ON book.id=borrow.book_id WHERE member_id = '$stuid' ORDER BY borrow_date DESC";
    $query = $connection->query($sql);
?>
<?php include 'header.php'; ?>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

	<?php include 'navigation.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-10 col-sm-offset-1">
	        		<div class="box">
	        			<div class="box-header with-border">
	        				<h3 class="box-title">BORROW</h3>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered table-striped" id="example1">
			        			<thead>
			        				<th class="hidden"></th>
			        				<th>Date</th>
                                    <th>Book id</th>
			        				<th>ISBN</th>
			        				<th>Title</th>
			        				<th>Author</th>
                                    <th>Status</th>
			        			</thead>
			        			<tbody>
			        			<?php
			        				while($row = $query->fetch_assoc()){
                                        if($row['barstat']){
                        $status = '<span class="label label-danger">returned</span>';
                      }
                      else{
                        $status = '<span class="label label-default">not returned</span>';
                      }
			        					echo "
			        						<tr>
			        							<td class='hidden'></td>
			        							<td>".date('M d, Y', strtotime($row['borrow_date']))."</td>
                                                <td>".$row['book_id']."</td>
			        							<td>".$row['isbn']."</td>
			        							<td>".$row['title']."</td>
			        							<td>".$row['author']."</td>
                                                <td>".$status."</td>
			        						</tr>

			        					";
			        				}
			        			?>
			        			</tbody>
			        		</table>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'footer.php'; ?>
</div>

<?php include 'scripts.php'; ?>
</body>
</html>