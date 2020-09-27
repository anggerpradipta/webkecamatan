<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ADMIN</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="../index.php"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <?php
          if ($_SESSION['role'] == 'admin') {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-green"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tambah_user.php"><i class="fa fa-user-plus"></i> Tambah User</a></li>
            <li><a href="user_view.php"><i class="fa fa-search"></i> Lihat User</a></li>
          </ul>
        </li>
        <?php
          }else{
        ?>
        <?php
          }
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-large text-blue"></i>
            <span>Acara</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tambah_acara.php"><i class="fa fa-plus-square-o"></i> Tambah Acara</a></li>
            <li><a href="acara_view.php"><i class="fa fa-search"></i> Lihat Acara</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-trophy text-yellow"></i>
            <span>Prestasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="prestasi_tambah.php"><i class="fa fa-plus-square-o"></i> Tambah Prestasi</a></li>
            <li><a href="prestasi_view.php"><i class="fa fa-search"></i> Lihat Prestasi</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>