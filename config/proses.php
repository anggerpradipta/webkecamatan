<?php 
    session_start();
	include 'connetion.php';
	$data = new configData();

	$aksi = $_GET['aksi'];
	if($aksi == "login")
	{ 	
		if($data->checkAdmin($_POST['username'],$_POST['password']) == true)
		{
			foreach ($data->checkAdmin($_POST['username'],$_POST['password']) as $ca) {
				
			}
			$_SESSION['role'] = "admin";
			$_SESSION['id'] = $ca['admin_id'];
			$_SESSION['nama'] = $ca['admin_nama'];
			header("location:../pages/home.php?msg=success");
		}
		elseif ($data->checkUser($_POST['username'],$_POST['password']) == true) 
		{
			foreach ($data->checkUser($_POST['username'],$_POST['password']) as $cu) {
				
			}
			$_SESSION['role'] = "user";
			$_SESSION['id'] = $cu['user_id'];
			$_SESSION['nama'] = $cu['user_nama'];
			header("location:../pages/home.php?msg=success");
		}
		else
		{
				header("location:../index.php?msg=Incorect!!!");
		}
	}
	elseif ($aksi == "addacara") {
		
		date_default_timezone_set('Asia/Jakarta');
		$time        = time();
		$nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
		$size        = $_FILES['gambar'] ['size'];// Size Gambar
		$error       = $_FILES['gambar'] ['error'];
		$tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
		$folder      = "../images/"; //folder tujuan upload
		$valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
		$n ="img-".date('mhis')."-".$nama_gambar;

		$tgl = $_POST['tanggal'];
		$bulan = substr($tgl,0,2);
		$hari = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		$tanggal = $tahun."-".$bulan."-".$hari;

		if(strlen($nama_gambar))
		{   
		// Perintah untuk mengecek format gambar
		list($txt, $ext) = explode(".", $nama_gambar);
		  if(in_array($ext,$valid))
		  {
			// Perintah untuk mengecek size file gambar
			if($size>0)
			{   
			  // Perintah untuk mengupload gambar dan memberi nama baru
			  $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			  $gmbr  = $folder.$gambarnya;
			  $tmp = $_FILES['gambar']['tmp_name'];
			  if(move_uploaded_file($tmp, $folder.$n))
			  {   
				$data->addAcara($_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$n);
				header("location:../pages/tambah_acara.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			  else
			  { 
					$data->addAcara($_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],'noimage');
					header("location:../pages/tambah_acara.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			}
			else
			{ 
				$data->addAcara($_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],'noimage');
				header("location:../pages/tambah_acara.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			}   
		  }
		  else
		  { 
				$data->addAcara($_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],'noimage');
				header("location:../pages/tambah_acara.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		  }
		}  
		else
		{ 
			$data->addAcara($_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],'noimage');
			header("location:../pages/tambah_acara.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		}  
	}
	elseif ($aksi == "updateacara") {
		
		date_default_timezone_set('Asia/Jakarta');
		$time        = time();
		$nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
		$size        = $_FILES['gambar'] ['size'];// Size Gambar
		$error       = $_FILES['gambar'] ['error'];
		$tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
		$folder      = "../images/"; //folder tujuan upload
		$valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
		$n ="img-".date('mhis')."-".$nama_gambar;

		$tgl = $_POST['tanggal'];
		$bulan = substr($tgl,0,2);
		$hari = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		$tanggal = $tahun."-".$bulan."-".$hari;
		if(strlen($nama_gambar))
		{   
		// Perintah untuk mengecek format gambar
		list($txt, $ext) = explode(".", $nama_gambar);
		  if(in_array($ext,$valid))
		  {
			// Perintah untuk mengecek size file gambar
			if($size>0)
			{   
			  // Perintah untuk mengupload gambar dan memberi nama baru
			  $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			  $gmbr  = $folder.$gambarnya;
			  $tmp = $_FILES['gambar']['tmp_name'];
			  if(move_uploaded_file($tmp, $folder.$n))
			  {   
				$data->updateAcara($_GET['id'],$_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$n);
				header("location:../pages/acara_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			  else
			  { 
					$data->updateAcara($_GET['id'],$_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$_GET['img']);
					header("location:../pages/acara_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			}
			else
			{ 
				$data->updateAcara($_GET['id'],$_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$_GET['img']);
				header("location:../pages/acara_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			}   
		  }
		  else
		  { 
				$data->updateAcara($_GET['id'],$_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$_GET['img']);
				header("location:../pages/acara_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		  }
		}  
		else
		{ 
			$data->updateAcara($_GET['id'],$_GET['pelapor'],$_POST['nama'],$tanggal,$_POST['jam_mulai'],$_POST['jam_selesai'],$_POST['lokasi'],$_POST['keterangan'],$_POST['menghadiri1'],$_POST['menghadiri2'],$_POST['menghadiri3'],$_POST['menghadiri4'],$_GET['img']);
			header("location:../pages/acara_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		}  
	}
	elseif ($aksi == "addprestasi") {
		
		date_default_timezone_set('Asia/Jakarta');
		$time        = time();
		$nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
		$size        = $_FILES['gambar'] ['size'];// Size Gambar
		$error       = $_FILES['gambar'] ['error'];
		$tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
		$folder      = "../images/"; //folder tujuan upload
		$valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
		$n ="img-".date('mhis')."-".$nama_gambar;

		$tgl = $_POST['tanggal'];
		$bulan = substr($tgl,0,2);
		$hari = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		$tanggal = $tahun."-".$bulan."-".$hari;
		if(strlen($nama_gambar))
		{   
		// Perintah untuk mengecek format gambar
		list($txt, $ext) = explode(".", $nama_gambar);
		  if(in_array($ext,$valid))
		  {
			// Perintah untuk mengecek size file gambar
			if($size>0)
			{   
			  // Perintah untuk mengupload gambar dan memberi nama baru
			  $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			  $gmbr  = $folder.$gambarnya;
			  $tmp = $_FILES['gambar']['tmp_name'];
			  if(move_uploaded_file($tmp, $folder.$n))
			  {   
				$data->addPrestasi($_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$n);
				header("location:../pages/prestasi_tambah.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			  else
			  { 
					$data->addPrestasi($_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],'noimage');
					header("location:../pages/prestasi_tambah.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			}
			else
			{ 
				$data->addPrestasi($_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],'noimage');
				header("location:../pages/prestasi_tambah.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			}   
		  }
		  else
		  { 
				$data->addPrestasi($_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],'noimage');
				header("location:../pages/prestasi_tambah.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		  }
		}  
		else
		{ 
			$data->addPrestasi($_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],'noimage');
			header("location:../pages/prestasi_tambah.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		}  
	}
	elseif ($aksi == "updateprestasi") {
		
		date_default_timezone_set('Asia/Jakarta');
		$time        = time();
		$nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
		$size        = $_FILES['gambar'] ['size'];// Size Gambar
		$error       = $_FILES['gambar'] ['error'];
		$tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
		$folder      = "../images/"; //folder tujuan upload
		$valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
		$n ="img-".date('mhis')."-".$nama_gambar;

		$tgl = $_POST['tanggal'];
		$bulan = substr($tgl,0,2);
		$hari = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		$tanggal = $tahun."-".$bulan."-".$hari;
		if(strlen($nama_gambar))
		{   
		// Perintah untuk mengecek format gambar
		list($txt, $ext) = explode(".", $nama_gambar);
		  if(in_array($ext,$valid))
		  {
			// Perintah untuk mengecek size file gambar
			if($size>0)
			{   
			  // Perintah untuk mengupload gambar dan memberi nama baru
			  $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			  $gmbr  = $folder.$gambarnya;
			  $tmp = $_FILES['gambar']['tmp_name'];
			  if(move_uploaded_file($tmp, $folder.$n))
			  {   
				$data->updatePrestasi($_GET['id'],$_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$n);
				header("location:../pages/prestasi_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			  else
			  { 
					$data->updatePrestasi($_GET['id'],$_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$_GET['img']);
					header("location:../pages/prestasi_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			  }
			}
			else
			{ 
				$data->updatePrestasi($_GET['id'],$_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$_GET['img']);
				header("location:../pages/prestasi_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
			}   
		  }
		  else
		  { 
				$data->updatePrestasi($_GET['id'],$_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$_GET['img']);
				header("location:../pages/prestasi_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		  }
		}  
		else
		{ 
			$data->updatePrestasi($_GET['id'],$_GET['pelapor'],$_POST['nama'],$_POST['pemberi'],$_POST['penerima'],$tanggal,$_POST['waktu'],$_POST['lokasi'],$_POST['keterangan'],$_GET['img']);
			header("location:../pages/prestasi_view.php?msg=".$_POST['nama']."&tgl=".$tanggal);
		}  
	}
	elseif ($aksi == "adduser") {
		$data->addUser($_POST['jabatan'],$_POST['nama'],$_POST['username'],$_POST['password']);
		header("location:../pages/tambah_user.php?msg=".$_POST['nama']);
	}
	elseif ($aksi == "deluser") {
		$data->delUser($_GET['id']);
		header("location:../pages/user_view.php?msg=success!");
	}
	elseif ($aksi == "update") {
		$data->updateUser($_GET['id'],$_POST['jabatan'],$_POST['nama'],$_POST['username'],$_POST['password']);
		header("location:../pages/user_view.php?msg=".$_GET['nama']);
	}
	elseif ($aksi == "delacara") {
		$data->delAcara($_GET['id']);
		header("location:../pages/acara_view.php?msg=success!");
	}
	elseif ($aksi == "delprestasi") {
		$data->delPrestasi($_GET['id']);
		header("location:../pages/prestasi_view.php?msg=success!");
	}
	elseif ($aksi == "add") {
		$tgl = $_POST['tanggal'];
		$bulan = substr($tgl,0,2);
		$hari = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		echo $tahun."-".$bulan."-".$hari;
	}
?>