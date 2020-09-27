<div class="box box-primary">
<div class="box-header">
    <h3 class="box-title">Semua Acara <b><?php echo $_GET['n']?></b></h3>
</div>
<div class="box-body">
    <form action="?c=acara&n=<?php echo $_GET['n']?>" method="post">
        <div class="form-group">
            <label>Awal:</label>
            <input type="date" class="form-control" name="awal" placeholder="Awal">
        </div><div class="form-group">
            <label>Akhir:</label>
            <input type="date" class="form-control" name="akhir" placeholder="Awal">
        </div><div class="form-group">
            <input type="submit" class="btn btn-primary" value="Cari">
        </div>
    </form>
</div>
</div>
<div class="box box-primary">
<div class="box-header">
    <h3 class="box-title">Semua Acara <b><?php echo $_GET['n']?></b></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Acara</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Menghadiri</th>
        <th>Keterangan</th>
        <th>Foto</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if (isset($_POST['awal']) && isset($_POST['akhir'])) {
            $no = 1;
            foreach ($data->showAcaraByTgl($_POST['awal'],$_POST['akhir']) as $ss) {
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $ss['acara_nama']?></td>
        <td><?php echo $ss['acara_tanggal']?></td>
        <td><?php echo $ss['acara_lokasi']?></td>
        <td>
            <ol>
            <li>Pelapor : <b><?php echo $ss['acara_tambah']?></b></li>
            <li><?php echo $ss['acara_menghadiri1']?></li>
            <li><?php echo $ss['acara_menghadiri2']?></li>
            <li><?php echo $ss['acara_menghadiri3']?></li>
            <li><?php echo $ss['acara_menghadiri4']?></li>
            </ol>
        </td>
        <td><?php echo $ss['acara_keterangan']?></td>
        <td style="text-align:center; padding-top:20px; padding-bottom:20px;">
            <?php
                if ($ss['acara_foto'] == "noimage") {
            ?>
                <a href="../images/noimage.png" target="_blank"><img src="../images/noimage.png" style="max-width: 150px;"/></a>
            <?php
                }else{
            ?>
                <a href="../images/<?php echo $ss['acara_foto']?>" target="_blank"><img src="../images/<?php echo $ss['acara_foto']?>" style="max-width: 150px;"/></a>
            <?php
                }
            ?>
        </td>
        </tr>
    <?php
        }
        }else{
            echo "no";
        }
        $no = 1;
        foreach ($data->showAcaraByUser($_GET['n']) as $ss) {
    ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $ss['acara_nama']?></td>
        <td><?php echo $ss['acara_tanggal']?></td>
        <td><?php echo $ss['acara_lokasi']?></td>
        <td>
            <ol>
            <li>Pelapor : <b><?php echo $ss['acara_tambah']?></b></li>
            <li><?php echo $ss['acara_menghadiri1']?></li>
            <li><?php echo $ss['acara_menghadiri2']?></li>
            <li><?php echo $ss['acara_menghadiri3']?></li>
            <li><?php echo $ss['acara_menghadiri4']?></li>
            </ol>
        </td>
        <td><?php echo $ss['acara_keterangan']?></td>
        <td style="text-align:center; padding-top:20px; padding-bottom:20px;">
            <?php
                if ($ss['acara_foto'] == "noimage") {
            ?>
                <a href="../images/noimage.png" target="_blank"><img src="../images/noimage.png" style="max-width: 150px;"/></a>
            <?php
                }else{
            ?>
                <a href="../images/<?php echo $ss['acara_foto']?>" target="_blank"><img src="../images/<?php echo $ss['acara_foto']?>" style="max-width: 150px;"/></a>
            <?php
                }
            ?>
        </td>
        </tr>
    <?php
        }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Acara</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Menghadiri</th>
        <th>Keterangan</th>
        <th>Foto</th>
    </tr>
    </tfoot>
    </table>
</div>
<div class="box-footer" align="center">
    <a href="user_view.php" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
    <a href="print/acara.php?n=<?php echo $ss['acara_tambah']?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> PRINT</a>
</div>
<!-- /.box-body -->
</div>