<?php
    $host = 'localhost'; // Nama hostnya
    $username = 'root'; // Username
    $password = 'cywu5gv4'; // Password (Isi jika menggunakan password)
    $database = 'kecamatan'; // Nama databasenya
    // Koneksi ke MySQL dengan PDO
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);


    class configData{
    
        var $host = "localhost";
        var $uname = "root";
        var $pass = "cywu5gv4";
        var $db = "kecamatan";
        var $connect = false;
    
        function __construct()
        { //untuk memberi nilai awal dari properti
            $this->connect = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        }

        function checkAdmin($user,$pass)
        {
            $sql = "SELECT * FROM `admin` WHERE `admin_username` = '$user' AND `admin_password` = '$pass'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function checkUser($user,$pass)
        {
            $sql = "SELECT * FROM `user` WHERE `user_username` = '$user' AND `user_password` = '$pass'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showUserAll()
        {
            $sql = "SELECT u.user_id, j.jabatan_id, j.jabatan_nama, u.user_nama, u.user_username, u.user_password, u.role FROM `user` u INNER JOIN `jabatan` j ON u.jabatan_id=j.jabatan_id";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showJabatan()
        {
            $sql = "SELECT * FROM `jabatan`";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showUpUser($id)
        {
            $sql = "SELECT * FROM `user` WHERE `user_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showUpAcara($id)
        {
            $sql = "SELECT * FROM `acara` WHERE `acara_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showUpPrestasi($id)
        {
            $sql = "SELECT * FROM `prestasi` WHERE `prestasi_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function delUser($id)
        {
            $sql = "DELETE FROM `user` WHERE `user_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }

        function addAcara($pelapor,$nama,$tanggal,$jam_mulai,$jam_selesai,$lokasi,$keterangan,$menghadiri1,$menghadiri2,$menghadiri3,$menghadiri4,$n)
        {
            //echo $pelapor." - ".$nama." - ".$tanggal." - ".$jam_mulai." - ".$jam_selesai." - ".$lokasi." - ".$menghadiri1." - ".$menghadiri2." - ".$menghadiri3." - ".$menghadiri4." - ".$keterangan." - ".$n;
            //exit;
            $sql = "INSERT INTO `acara`(`acara_tambah`, `acara_nama`, `acara_tanggal`, `acara_jam_mulai`, `acara_jam_selesai`, `acara_lokasi`, `acara_menghadiri1`, `acara_menghadiri2`, `acara_menghadiri3`, `acara_menghadiri4`, `acara_keterangan`, `acara_foto`) 
            VALUES ('$pelapor','$nama','$tanggal','$jam_mulai','$jam_selesai','$lokasi','$menghadiri1','$menghadiri2','$menghadiri3','$menghadiri4','$keterangan','$n')";
            $d= mysqli_query($this->connect, $sql);
        }

        function addPrestasi($pelapor,$nama,$pemberi,$penerima,$tanggal,$waktu,$lokasi,$keterangan,$n)
        {
            $sql = "INSERT INTO `prestasi`(`prestasi_tambah`, `nama_penghargaan`, `pemberi`, `penerima`, `tanggal`, `waktu`, `lokasi`, `keterangan`, `gambar`) 
            VALUES ('$pelapor','$nama','$pemberi','$penerima','$tanggal','$waktu','$lokasi','$keterangan','$n')";
            $d= mysqli_query($this->connect, $sql);
        }

        function addUser($jabatan,$nama,$username,$password)
        {
            //echo $pelapor." - ".$nama." - ".$tanggal." - ".$jam_mulai." - ".$jam_selesai." - ".$lokasi." - ".$menghadiri1." - ".$menghadiri2." - ".$menghadiri3." - ".$menghadiri4." - ".$keterangan." - ".$n;
            //exit;
            $sql = "INSERT INTO `user`(`jabatan_id`, `user_nama`, `user_username`, `user_password`, `role`) VALUES ('$jabatan', '$nama', '$username', '$password', 'user')";
            $d= mysqli_query($this->connect, $sql);
        }

        function updateUser($id,$jabatan,$nama,$username,$password)
        {
            $sql = "UPDATE `user` SET `jabatan_id`='$jabatan',`user_nama`='$nama',`user_username`='$username',`user_password`='$password',`role`='user' WHERE `user_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }

        function showAcaraByUser($nama)
        {
            $sql = "SELECT * FROM `acara` WHERE `acara_tambah` = '$nama'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showPrestasiByUser($nama)
        {
            $sql = "SELECT * FROM `prestasi` WHERE `prestasi_tambah` = '$nama'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showAcaraByID($id)
        {
            $sql = "SELECT * FROM `acara` WHERE `acara_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showPrestasiByID($id)
        {
            $sql = "SELECT * FROM `prestasi` WHERE `prestasi_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showAllAcara()
        {
            $sql = "SELECT * FROM `acara` ORDER BY `acara_id` DESC";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showAllPrestasi()
        {
            $sql = "SELECT * FROM `prestasi` ORDER BY `prestasi_id` DESC";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function countAcara()
        {
            $sql = "SELECT COUNT(*) AS jumlah FROM `acara`";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function countPrestasi()
        {
            $sql = "SELECT COUNT(*) AS jumlah FROM `prestasi`";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function showAcaraByTgl($awal, $akhir)
        {
            $sql = "SELECT * FROM `acara` WHERE `acara_tanggal` >= '$awal' AND `acara_tanggal` <= '$akhir' ";
            $d= mysqli_query($this->connect, $sql);
            $hasil = array();
            while($row = mysqli_fetch_array($d)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function delAcara($id)
        {
            $sql = "DELETE FROM `acara` WHERE `acara_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }

        function delPrestasi($id)
        {
            $sql = "DELETE FROM `prestasi` WHERE `prestasi_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }

        function updateAcara($id,$pelapor,$nama,$tanggal,$jam_mulai,$jam_selesai,$lokasi,$keterangan,$menghadiri1,$menghadiri2,$menghadiri3,$menghadiri4,$n)
        {
            $sql = "UPDATE `acara` SET `acara_tambah`='$pelapor',`acara_nama`='$nama',`acara_tanggal`='$tanggal',`acara_jam_mulai`='$jam_mulai',`acara_jam_selesai`='$jam_selesai',`acara_lokasi`='$lokasi',`acara_menghadiri1`='$menghadiri1',`acara_menghadiri2`='$menghadiri2',`acara_menghadiri3`='$menghadiri3',`acara_menghadiri4`='$menghadiri4',`acara_keterangan`='$keterangan',`acara_foto`='$n' WHERE `acara_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }

        function updatePrestasi($id,$pelapor,$nama,$pemberi,$penerima,$tanggal,$waktu,$lokasi,$keterangan,$n)
        {
            $sql = "UPDATE `prestasi` SET `prestasi_tambah`='$pelapor',`nama_penghargaan`='$nama',`pemberi`='$pemberi',`penerima`='$penerima',`tanggal`='$tanggal',`waktu`='$waktu',`lokasi`='$lokasi',`keterangan`='$keterangan',`gambar`='$n' WHERE `prestasi_id` = '$id'";
            $d= mysqli_query($this->connect, $sql);
        }
    }
?>