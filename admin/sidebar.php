<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['name']; ?></p>
      Librarian<br>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class=""><a href="home.php"><i class="fa fa-home"></i> <span>Overview</span></a></li>
      <li class="header">MANAGE</li>
      <li class="treeview">
          <li><a href="book.php"><i class="fa fa-book"></i> <span>Book List</span></a></li>
          <li><a href="student.php"><i class="fa fa-users"></i> <span>Student List</span></a></li>
          <li><a href="category.php"><i class="fa fa-list"></i><span> Category</span></a></li>
          <li><a href="course.php"><i class="fa fa-table"></i> <span>Course</span></a></li>
          <li><a href="borrow.php"><i class="fa fa-mail-reply"></i> <span>Borrow</span></a></li>
          <li><a href="return.php"><i class="fa fa-mail-forward"></i> <span>Return</span></a></li>
          <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>