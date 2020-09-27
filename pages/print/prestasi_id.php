<?php
  session_start();
  include "../../config/connetion.php";
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
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../font/font.css">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row"><hr style="margin-top: -5px;"/>
      <div class="col-xs-2" style="padding-bottom:10px;">
        <img src="../../images/logokab.jpg" style="max-width:90px;">
      </div>
      <div class="col-xs-10" align="center" style="padding-top: 5px;">
        <a style="font-size:14px;">PEMERINTAHAN KABUPATEN SLEMAN</a><br/>
        <b style="font-size:20px;">KECAMATAN NGEMPLAK</b>
        <p style="font-size:13px;">Jalan Jangkang, Widodomartani, Ngemplak, Sleman, Yogyakarta, 55584<br/>Telepon (0274) 4461107, Faksimile (0274) 4461107<br/>Laman: www.ngemplakkec.slemankab.go.id, Surel: kecngemplak@slemankab.go.id</p>
      </div>
      <div class="col-xs-12">
        <hr style="border:1px; border-style:solid; border-color: black; margin-top: 0px;"/>
        <hr style="border:2px; border-style:solid; border-color: black; margin-top:-18px;"/>
      </div>
      <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12" style="text-align:center; margin-bottom:10px;">
        LAPORAN Prestasi (<?php echo date('Y');?>)
      </div>
      <div class="col-xs-12 table-responsive" style="font-size:12px;">
        <?php 
            foreach ($data->showPrestasiByID($_GET['id']) as $prestasi) {
                # code...
            }
        ?>
        <table class="table">
            <tr>
                <th style="padding:5px; width: 180px; background-color:rgba(233, 237, 243, 0.5);">Pelapor</th>
                <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['prestasi_tambah'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px;">Nama Penghargaan</th>
                <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['nama_penghargaan'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px; background-color:rgba(233, 237, 243, 0.5);">Pemberi</th>
                <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['pemberi'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px;">Penerima</th>
                <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['penerima'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px; background-color:rgba(233, 237, 243, 0.5);">Tanggal</th>
                <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['prestasi_tanggal'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px;">Waktu</th>
                <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['waktu'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px; background-color:rgba(233, 237, 243, 0.5);">Lokasi</th>
                <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> :&nbsp;&nbsp; <?php echo $prestasi['lokasi'];?></td>
            </tr>
            <tr>
                <th style="padding:5px; width: 180px;">Keterangan / Deskripsi</th>
                <td style="padding:5px;"> :&nbsp;&nbsp; <?php echo $prestasi['keterangan'];?></td>
            </tr>
            <tr>
                    <?php
                        if ($prestasi['gambar'] == "noimage") {
                    ?>
                        <th style="padding:5px; width: 180px; background-color:rgba(233, 237, 243, 0.5);"></th>
                        <td style="padding:5px; background-color:rgba(233, 237, 243, 0.5);"> </td>
                    <?php
                        }else{
                    ?>
                    <th style="padding:5px; width: 180px;">Foto </th>
                    <td style="padding:5px;"> 
                        <img src="../../images/<?php echo $prestasi['gambar'];?>" style="width:200px; height:auto;">
                    </td>
                    <?php
                        }
                    ?>
            </tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive pull-right">
        <p>
          <?php 
            echo "Ngemplak, ".date('d F Y');
          ?><br/>
          Notulis,
        </p>
          <table class="table">
            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>(_______________________)</td>
            </tr>
          </table>
        </div>
      </div> 
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
    }else{
        header('location:../../index.php');
    }
?>