<?php
  session_start();
  include "../config/connetion.php";
  $data = new configData();
  if(isset($_SESSION[role])){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACT - KECAMATAN NGEMPLAK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
    .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
    }

    .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php
        include "template/navigasi.php";

        include "template/sidebar.php";
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Prestasi
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Prestasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Semua Data Penghargaan</h3>
                <a href="prestasi_tambah.php" class="btn btn-success pull-right"><i class="fa fa-user-plus"></i> Tambah Prestasi</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Penghargaan</th>
                  <th>Pemberi</th>
                  <th>Penerima</th>
                  <th>Tanggal / Waktu</th>
                  <th>Lokasi</th>
                  <th>Keterangan</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  if($_SESSION['role'] == 'admin'){
                    foreach ($data->showAllPrestasi() as $ss) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $ss['nama_penghargaan']?></td>
                        <td><?php echo $ss['pemberi']?></td>
                        <td><?php echo $ss['penerima']?></td>
                        <td><?php echo $ss['tanggal']?> ( <?php echo $ss['waktu']?> )</td>
                        <td><?php echo $ss['lokasi']?></td>
                        <td><?php echo $ss['keterangan']?></td>
                        <td style="text-align:center; padding-top:20px; padding-bottom:20px;">
                            <?php
                                if ($ss['gambar'] == "noimage") {
                            ?>
                                <a href="../images/noimage.png" target="_blank"><img src="../images/noimage.png" style="max-width: 150px;"/></a>
                            <?php
                                }else{
                            ?>
                                <a href="../images/<?php echo $ss['gambar']?>" target="_blank"><img src="../images/<?php echo $ss['gambar']?>" style="max-width: 150px;"/></a>
                            <?php
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <a href="acara_view_id.php?id=<?php echo $ss['acara_id']?>&p=<?php echo $ss['acara_tambah']?>&n=<?php echo $ss['acara_nama']?>" class="btn btn-default" style="color:#357ca5;"><i class="fa fa-eye"></i></a>
                            <a href="tambah_acara.php?update=<?php echo $ss['acara_id'];?>" class="btn btn-default" style="color:#008d4c;"><i class="fa fa-pencil"></i></a>
                            <a href="../config/proses.php?aksi=delacara&id=<?php echo $ss['acara_id']?>&nama=<?php echo $ss['acara_nama']?>" onclick="return konfirmasi('<?php echo $ss['acara_nama'];?>')" class="btn btn-default" style="color:#dd4b39;"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                  }else{
                    foreach ($data->showPrestasiByUser($_SESSION['nama']) as $ss) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $ss['nama_penghargaan']?></td>
                        <td><?php echo $ss['pemberi']?></td>
                        <td><?php echo $ss['penerima']?></td>
                        <td><?php echo $ss['tanggal']?> ( <?php echo $ss['waktu']?> )</td>
                        <td><?php echo $ss['lokasi']?></td>
                        <td><?php echo $ss['keterangan']?></td>
                        <td style="text-align:center; padding-top:20px; padding-bottom:20px;">
                            <?php
                                if ($ss['gambar'] == "noimage") {
                            ?>
                                <a href="../images/noimage.png" target="_blank"><img src="../images/noimage.png" style="max-width: 150px;"/></a>
                            <?php
                                }else{
                            ?>
                                <a href="../images/<?php echo $ss['gambar']?>" target="_blank"><img src="../images/<?php echo $ss['gambar']?>" style="max-width: 150px;"/></a>
                            <?php
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <a href="prestasi_view_id.php?id=<?php echo $ss['prestasi_id']?>&p=<?php echo $ss['prestasi_tambah']?>&n=<?php echo $ss['nama_penghargaan']?>" class="btn btn-default" style="color:#357ca5;"><i class="fa fa-eye"></i></a>
                            <a href="prestasi_tambah.php?update=<?php echo $ss['prestasi_id'];?>" class="btn btn-default" style="color:#008d4c;"><i class="fa fa-pencil"></i></a>
                            <a href="../config/proses.php?aksi=delprestasi&id=<?php echo $ss['prestasi_id']?>&nama=<?php echo $ss['nama_penghargaan']?>" onclick="return konfirmasi('<?php echo $ss['nama_penghargaan'];?>')" class="btn btn-default" style="color:#dd4b39;"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                    <th>#</th>
                    <th>Nama Penghargaan</th>
                    <th>Pemberi</th>
                    <th>Penerima</th>
                    <th>Tanggal / Waktu</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include "template/footer.php";
  ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript" language="JavaScript">
    function konfirmasi(str){
      tanya = confirm("Hapus data "+str+" ?");
      if (tanya == true) 
          return true;
      else return false;
    }
</script>
</body>
</html>
<?php
    }else{
        header('location:../index.php');
    }
?>
