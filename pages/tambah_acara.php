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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        <i class="fa fa-plus"></i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Acara</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
        <?php
            if (isset($_GET['msg'])) {
        ?>
        <div class="col-md-12">
            <div class="callout callout-success">
                <b>BERHASIL</b>
                <h1 class="box-title">Acara <?php echo $_GET['msg'];?>, berhasil ditambahkan</h1>
                <p>Dilaksanakan pada tanggal :  <b class="hidden-xs" style="text-transform: uppercase;"><?php echo $_GET['tgl'];?></b></p>
                <div align="center">
                    <a href="tambah_acara.php" class="btn btn-social btn-bitbucket" style="text-align:center;">
                        <i class="fa fa-arrow-circle-o-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <?php
            }elseif(isset($_GET['update'])){
        ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Acara</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <?php 
                  foreach ($data->showUpAcara($_GET['update']) as $acara) {
                  }
              ?>
              <form action="../config/proses.php?aksi=updateacara&id=<?php echo $acara['acara_id'];?>&pelapor=<?php echo $_SESSION['nama'];?>&img=<?php echo $acara['acara_foto'];?>" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Pelapor:</label>
                              <input type="text" class="form-control" name="pelapor" value="<?php echo $_SESSION['nama'];?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Nama Acara:</label>
                              <input type="text" class="form-control" name="nama" value="<?php echo $acara['acara_nama'];?>" required>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Tanggal:</label>

                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" value="<?php echo $acara['acara_tanggal'];?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jam Mulai:</label>

                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                  </div>
                                  <input type="text" name="jam_mulai" class="form-control timepicker" value="<?php echo $acara['acara_jam_mulai'];?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jam Selesai:</label>

                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                  </div>
                                  <input type="text" name="jam_selesai"class="form-control timepicker" value="<?php echo $acara['acara_jam_selesai'];?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Lokasi:</label>
                              <textarea class="form-control" name="lokasi" required><?php echo $acara['acara_lokasi'];?></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Keterangan:</label>
                              <textarea class="form-control" name="keterangan" required><?php echo $acara['acara_keterangan'];?></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Menghadiri:</label> (Siapa saja yang ikut serta menghadiri acara?)
                              <input type="text" class="form-control" name="menghadiri1" value="<?php echo $acara['acara_menghadiri1'];?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label> &nbsp;</label>
                              <input type="text" class="form-control" name="menghadiri2" value="<?php echo $acara['acara_menghadiri2'];?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" name="menghadiri3" value="<?php echo $acara['acara_menghadiri3'];?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" name="menghadiri4" value="<?php echo $acara['acara_menghadiri4'];?>">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Foto:</label><br/>
                              <?php
                                  if ($acara['acara_foto'] == "noimage") {
                              ?>
                                  <a href="../images/noimage.png" target="_blank"><img src="../images/noimage.png" style="max-width: 250px; max-height: 150px; height: auto;"/></a><br/><br/>
                              <?php
                                  }else{
                              ?>
                                <a href="../images/<?php echo $acara['acara_foto'];?>" target="_blank"><img src="../images/<?php echo $acara['acara_foto'];?>" style="max-width: 250px; max-height: 150px; height: auto;"/></a><br/><br/>
                              <?php
                                  }
                              ?>
                              <div class="btn btn-default btn-file" style="border:2px; border-style:solid; border-color:#3c8dbc; border-radius:5px;">
                                  <i class="fa fa-image"></i> &nbsp;Ganti Foto
                                  <input type="file" name="gambar" id="image-source" value="<?php echo $acara['acara_foto4'];?>" onchange="previewImage();">
                              </div>
                              <p class="help-block">Max. 3MB</p>
                              <img scr="../images/<?php echo $acara['acara_foto'];?>" class="responsiveimage"/>
                              <img id="image-preview" class="responsiveimage" alt="image preview"/>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group" align="center">
                              <a href="acara_view.php" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                              <input type="reset" class="btn btn-warning" value="RESET">
                              <input type="submit" class="btn btn-primary" value="KIRIM">
                          </div>
                      </div>
                  </div>
              </form>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php
            }else{
        ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Acara</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form action="../config/proses.php?aksi=addacara&pelapor=<?php echo $_SESSION['nama'];?>" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Pelapor:</label>
                              <input type="text" class="form-control" name="pelapor" value="<?php echo $_SESSION['nama'];?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Nama Acara:</label>
                              <input type="text" class="form-control" name="nama" placeholder="Nama Acara" required>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Tanggal:</label>

                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" placeholder="mm/dd/yyyy" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jam Mulai:</label>

                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                  </div>
                                  <input type="text" name="jam_mulai" class="form-control timepicker" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Jam Selesai:</label>

                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                  </div>
                                  <input type="text" name="jam_selesai"class="form-control timepicker" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Lokasi:</label>
                              <textarea class="form-control" name="lokasi" placeholder="Lokasi Acara" required></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Keterangan:</label>
                              <textarea class="form-control" name="keterangan" placeholder="Keterangan / Deskripsi Acara" required></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Menghadiri:</label> (Siapa saja yang ikut serta menghadiri acara?)
                              <input type="text" class="form-control" name="menghadiri1" placeholder="1">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label> &nbsp;</label>
                              <input type="text" class="form-control" name="menghadiri2" placeholder="2">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" name="menghadiri3" placeholder="3">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" name="menghadiri4" placeholder="4">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <div class="btn btn-default btn-file" style="border:2px; border-style:solid; border-color:#3c8dbc; border-radius:5px;">
                                  <i class="fa fa-image"></i> &nbsp;Upload Foto
                                  <input type="file" name="gambar" id="image-source" onchange="previewImage();">
                              </div>
                              <p class="help-block">Max. 3MB</p>
                              <img id="image-preview" class="responsiveimage" alt="image preview"/>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group" align="center">
                              <input type="reset" class="btn btn-warning" value="RESET">
                              <input type="submit" class="btn btn-primary" value="KIRIM">
                          </div>
                      </div>
                  </div>
              </form>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php
            }
        ?>

    </section>
    <!-- /.content -->
  </div>
  <?php
    include "template/footer.php";
  ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
  
  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
</body>
</html>

<?php
    }else{
        header('location:../index.php');
    }
?>