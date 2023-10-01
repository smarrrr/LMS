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
        Borrow Books
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Borrow</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Error!</h4>
                <ul>
                <?php
                  foreach($_SESSION['error'] as $error){
                    echo "
                      <li>".$error."</li>
                    ";
                  }
                ?>
                </ul>
            </div>
          <?php
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
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-plus"></i> Borrow</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Member ID</th>
                  <th>Name</th>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, member.id AS stud,borrow.status AS barstat FROM borrow LEFT JOIN member ON member.id=borrow.member_id LEFT JOIN book ON book.id=borrow.book_id ORDER BY borrow_date DESC";
                    $query = $connection->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['barstat']){
                        $status = '<span class="label label-danger">returned</span>';
                      }
                      else{
                        $status = '<span class="label label-default">not returned</span>';
                      }
                      echo"
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M, d, Y', strtotime($row['borrow_date']))."</td>
                          <td>".$row['stud']."</td>
                          <td>".$row['name']."</td>
                          <td>".$row['book_id']."</td>
                          <td>".$row['title']."</td>
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
    
  <?php include 'footer.php'; ?>
  <?php include 'modal/borrow_modal.php'; ?>
</div>
<?php include 'scripts.php'; ?>
<script>
  function rem_select(){
    $('[name="isbn[]"]').change(function(){
      if($(this).val() == '<rem>'){
        $(this).closest('.form-group').remove()
      }
    })
  }
$(function(){
  $(document).on('click', '#append', function(e){
    e.preventDefault();
    var book = '<?php echo json_encode($brows) ?>';
    var _s = $('<select class="form-control" name="isbn[]"></select>')
    var _tmp = $('<div></div>')
    var option = '';
        option += '<option value="" selected disabled>Please Select Book here.</option>';
        option += '<option value="<rem>" >< remove select></option>';
        book = JSON.parse(book)
        if(book.length > 0){
          Object.keys(book).map(k=>{
            option  += '<option value="'+book[k].isbn+'">'+book[k].title+' ['+book[k].isbn+']'+'</option>'
          })
        }
        _s.append(option)
        _tmp.append(_s)
    
    $('#append-div').append(
      '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9">'+_tmp.html()+'</div></div>'
    );
    rem_select()
  });
});

</script>
</body>
</html>
