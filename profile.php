<?php include 'session.php'; ?>
<?php
if(!isset($_SESSION['member']) || trim($_SESSION['member']) == ''){
  header('index.php');
}

$stuid = $member['id'];

   $sql = "SELECT * FROM member where id='$stuid'";
    $query = $connection->query($sql);

?>
<?php include 'header.php'; ?>
<body class='hold-transition skin-red layout-top-nav'>
<div class="wrapper">

  <?php include 'navigation.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Profile</li>
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
              <table id="example1" class="table">
              <?php
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/profile.jpg';
                      echo "
                      <tr>
                      <td colspan=2 align=right>
                      <img src='".$photo."' width='100px' height='100px'>
                      </td>
                    </tr>
                <tr>
                      <td>id</td>
                      <td>".$row['id']."</td>
                <tr>
                  <td>Username</td>
                  <td>".$row['username']."</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>".$row['name']."</td>
                </tr>
                <tr>
                  <td>Sex</td>
                  <td>".$row['sex']."</td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td>".$row['dob']."</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>".$row['address']."</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>".$row['email']."</td>
                </tr>
                <tr>
                  <td>Phone number</td>
                  <td>".$row['phone']."</td>
                </tr>

                      ";
                    }
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'footer.php'; ?>
</div>
</body>
</html>
