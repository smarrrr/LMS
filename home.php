<!--Session inlcuded to identfy user session-->
<?php 
include 'session.php';
if(!isset($_SESSION['member']) || trim($_SESSION['member']) == ''){
	header('index.php');
}
?>
<!-- get information about the categories of books-->
<?php
	$where = '';
	if(isset($_GET['category'])){
		$catid = $_GET['category'];
		$where = 'WHERE category_id ='.$catid;
	}
?>
<!--Member module header -->
<?php include 'header.php'; ?>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
<!--include top navigation bar-->
	<?php include 'navigation.php'; ?>
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content for member module -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-8 col-sm-offset-2">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
					<!--for search bar-->
	        		<div class="box">
	        			<div class="box-header with-border">
	        				<div class="input-group">
				                <input type="text" class="form-control input-lg" id="searchBox" placeholder="Enter ISBN, Title or Author">
				                <span class="input-group-btn">
				                    <button type="button" class="btn btn-danger btn-flat btn-lg"><i class="fa fa-search"></i> </button>
				                </span>
				            </div>
	        			</div>
	        			<div class="box-body">
	        				<div class="input-group col-sm-5">
				                <span class="input-group-addon">Category:</span>
				                <select class="form-control" id="catlist">
				                	<option value=0>ALL</option>
				                	<?php
				                		$sql = "SELECT * FROM category";
				                		$query = $connection->query($sql);
				                		while($catrow = $query->fetch_assoc()){
				                			$selected = ($catid == $catrow['id']) ? "selected" : "";
				                			echo "
				                				<option value='".$catrow['id']."' ".$selected.">".$catrow['name']."</option>
				                			";
				                		}
				                	?>
				                </select>
				             </div>
	        				<table class="table table-bordered" id="books">
			        			<thead>
                                    <th>Photo</th>
			        				<th>ISBN</th>
			        				<th>Title</th>
			        				<th>Author</th>
									<th>Publication</th>
                                    <th>Edition</th>
			        				<th>Status</th>
			        			</thead>
			        			<tbody>
			        			<?php
			        				$sql = "SELECT * FROM book $where";
			        				$query = $connection->query($sql);
			        				while($row = $query->fetch_assoc()){
			        					$status = ($row['status'] == 0) ? '<span class="label label-danger">available</span>' : '<span class="label label-default">not available</span>';
										$photo = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/book.jpg';
			        					echo "
			        						<tr>
                                                <td><img src='".$photo."' width='60px' height='100px'></td>
			        							<td>".$row['isbn']."</td>
			        							<td>".$row['title']."</td>
			        							<td>".$row['author']."</td>
												<td>".$row['publisher']."</td>
                                                <td>".$row['edition']."</td>
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
<script>
$(function(){
	$('#catlist').on('change', function(){
		if($(this).val() == 0){
			window.location = 'home.php';
		}
		else{
			window.location = 'home.php?category='+$(this).val();
		}
		
	});
	$(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
});
</script>
</body>
</html>