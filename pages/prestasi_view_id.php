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
  <style>
    #image-preview{
    }
    .responsiveimage {
        width: 100%;
        max-width: 450px;
        max-height: 270px;
        height: auto;
        display:none;
        border: 2px;
        border-style: solid;
        border-radius: 5px;
        border-color: #3c8dbc;
    }
  </style>

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
        <?php echo $_GET['n'];?>
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $_GET['n']?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="font-size:16px;">
                <?php 
                    foreach ($data->showPrestasiByID($_GET['id']) as $prestasi) {
                        # code...
                    }
                ?>
                <table class="table">
                    <tr>
                        <th style="padding:5px; width: 190px; background-color:rgba(233, 237, 243, 0.5);">Pelapor</th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['prestasi_tambah'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px;">Nama Penghargaan</th>
                        <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['nama_penghargaan'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px; background-color:rgba(233, 237, 243, 0.5);">Pemberi</th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['pemberi'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px; background-color:rgba(233, 237, 243, 0.5);">Penerima</th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['penerima'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px; background-color:rgba(233, 237, 243, 0.5);">Tanggal</th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['tanggal'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px;">Waktu</th>
                        <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['waktu'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px; background-color:rgba(233, 237, 243, 0.5);">Lokasi</th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['lokasi'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px;">Keterangan / Deskripsi&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['keterangan'];?></td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px;">Foto&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <td style="padding:5px;"> :</td>
                    </tr>
                    <tr>
                        <th style="padding:5px; width: 190px;"></th>
                        <td style="padding-top:15px;">
                            <?php
                                if ($prestasi['gambar'] == "noimage") {
                            ?>
                                <img src="../images/noimage.png" style="width:300px; height:auto;"/>
                            <?php
                                }else{
                            ?> &nbsp;&nbsp; <a href="../images/<?php echo $prestasi['gambar'];?>" target="_blank"><img src="../images/<?php echo $prestasi['gambar'];?>" style="max-width:450px; height:auto;"></a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="box-footer" align="center">
                <a href="prestasi_view.php" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                <a href="print/prestasi_id.php?id=<?php echo $prestasi['prestasi_id']?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> PRINT</a>
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
