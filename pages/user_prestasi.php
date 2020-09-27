<div class="box box-primary">
<div class="box-header">
    <h3 class="box-title">Semua Prestasi <b><?php echo $_GET['n']?></b></h3>
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
        </tr>
        </thead>
    <tbody>
    <?php
        $no = 1;
        foreach ($data->showPrestasiByUser($_GET['n']) as $ss) {
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
        </tr>
    <?php
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
    </tr>
    </tfoot>
    </table>
</div>
<div class="box-footer" align="center">
    <a href="user_view.php" class="btn btn-success"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
    <a href="print/prestasi.php?n=<?php echo $ss['prestasi_tambah']?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> PRINT</a>
</div>
<!-- /.box-body -->
</div>