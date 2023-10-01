<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><b>LACM</b>Library Managment System</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['member'])){
              echo "
                <li><a href='home.php'>HOME</a></li>
                <li><a href='borrow.php'>BORROW</a></li>
                <li><a href='return.php'>RETURN</a></li>
                <li><a href='profile.php'>PROFILE</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['member'])){
              $photo = (!empty($member['photo'])) ? 'images/'.$member['photo'] : 'images/profile.jpg';
              echo "
                <li class='user user-menu'>
                  <a href='#'>
                    <img src='".$photo."' class='user-image' alt='User Image'>
                    <span class='hidden-xs'>".$member['name']."</span>
                  </a>
                </li>
                <li><a href='logout.php'><i class='fa fa-sign-out'></i> LOGOUT</a></li>
              ";
            }
            else{
              echo "
                <li><a href='#login' data-toggle='modal'><i class='fa fa-sign-in'></i> Sign in </a></li>
                <li><a href='admin/home.php'>Admin Sign in </a></li>
              ";
            } 
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php include 'modals/signin_modal.php'; ?>