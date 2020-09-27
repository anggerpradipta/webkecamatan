<header class="main-header">

<!-- Logo -->
<a href="../index.php" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>Kec.</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg">Kec<b>-NGEMPLAK</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
          <span class="hidden-xs" style="text-transform: uppercase;"><?php echo $_SESSION['role'];?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">

            <p>
              <?php
                echo $_SESSION['nama'];
              ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="../config/logout.php" class="btn btn-danger btn-flat">Keluar</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>

</nav>
</header>