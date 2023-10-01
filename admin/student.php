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
        Member List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Member List</li>
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
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-plus"></i> Register new members</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Member ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Sex</th>
                  <th>Dob</th>
                  <th>address</th>
                  <th>Email</th>
                  <th>Phone no.</th>
                  <th>Photo</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, member.id AS mid, member.name AS mname FROM member LEFT JOIN course ON course.id=member.course_id";
                    $query = $connection->query($sql);
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          <td>".$row['mid']."</td>
                          <td>".$row['username']."</td>
                          <td>".$row['mname']."</td>
                          <td>".$row['code']."</td>
                          <td>".$row['sex']."</td>
                          <td>".$row['dob']."</td>
                          <td>".$row['address']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['phone']."</td>
                          <td>
                            <img src='".$photo."' width='60px' height='80px'>
                          </td>
                          <td>
                            <button class='btn btn-danger btn-sm edit btn-flat' data-id='".$row['mid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-default btn-sm delete btn-flat' data-id='".$row['mid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
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
  <?php include 'modal/student_modal.php'; ?>
</div>
<?php include 'scripts.php'; ?>
<script>
$(function(){
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
    url: 'student_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.mid').val(response.mid);
      $('#edit_username').val(response.username);
      $('#edit_name').val(response.name);
      $('#selcourse').val(response.course_id);
      $('#selcourse').html(response.code);
      $('#edit_email').val(response.email);
      $('#edit_sex').val(response.sex);
      $('#edit_phone').val(response.phone);
      $('#edit_dob').val(response.dob);
      $('#edit_address').val(response.address);
      $('.del_stu').html(response.name);
    }
  });
}
</script>
</body>
</html>
