<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <?php include 'navigation.php'; ?>
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Book List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Fines</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Book ID</th>
                  <th>title</th>
                  <th>Student name</th>
                  <th>Student id</th>
                  <th>Borrow Date</th>
                  <th>No. of Late days</th>
                  <th>Fine amount</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                  $sql='SELECT * FROM borrow';
                  $query = $connection->query($sql);
                  while($row = $query->fetch_assoc()){
                  $borrow_date=($row['borrow_date']);
                  $borrow_date=strtotime($borrow_date);
                  $borrow_date=date('Y:m:d',$borrow_date);
                  $date=(date('Y:m:d'));
                  $date=strtotime($date)
                  $diff = date_diff($date,$borrow_date);
                  if ($diff>-7)
                  {
                    $fine=
                    $sql = "SELECT *, member.id AS stud,borrow.status AS barstat FROM borrow LEFT JOIN member ON member.id=borrow.member_id LEFT JOIN book ON book.id=borrow.book_id ORDER BY borrow_date DESC ";
                    $query = $connection->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['status']){
                        $status = '<span class="label label-danger">unpaid</span>';
                      }
                      else{
                        $status = '<span class="label label-default">paid</span>';
                      }
                      echo "
                        <tr>
                          <td>".$row['book_id']."</td>
                          <td>".$row['title']."</td>
                          <td>".$row['name']."</td>
                          <td>".$row['stud']."</td>
                          <td>".$row['borrow_date']."</td>
                          <td>$day_diff</td>
                          <td>$fine</td>
                          <td>".$status."</td>
                          <td>
                            <button class='btn btn-danger btn-sm tick btn-flat' data-id='".$row['book_id']."'><i class='fa fa-tick'></i> Paid</button>
                          </td>
                        </tr>
                      ";
                    }
                  }
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
    
  <?php include 'footer.php'; ?>
  <?php include 'modal/book_modal.php'; ?>
</div>
<?php include 'scripts.php'; ?>
<script>
$(function(){
  $('#select_category').change(function(){
    var value = $(this).val();
    if(value == 0){
      window.location = 'book.php';
    }
    else{
      window.location = 'book.php?category='+value;
    }
  });

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'book_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.bookid').val(response.bookid);
      $('#edit_isbn').val(response.isbn);
      $('#edit_title').val(response.title);
      $('#catselect').val(response.category_id).html(response.name);
      $('#edit_author').val(response.author);
      $('#edit_publisher').val(response.publisher);
      $('#datepicker_edit').val(response.publish_date);
      $('#datepicker_edit').val(response.Reg_date);
      $('#edit_language').val(response.language);
      $('#edit_price').val(response.price);
      $('#edit_edition').val(response.edition);
      $('#edit_pages').val(response.pages);
      $('#del_book').html(response.title);
    }
  });
}
</script>
</body>
</html>
