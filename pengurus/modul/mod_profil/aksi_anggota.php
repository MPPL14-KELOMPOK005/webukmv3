<?php
        session_start();
      if (empty($_SESSION['pengurus_id']) AND empty($_SESSION['member_passuser'])){
echo "<meta http-equiv='refresh' content='3; url=http://$_SERVER[HTTP_HOST]'>";
	  exit("<link href='../../css/style.default.css' rel='stylesheet' type='text/css'>
      <body class='special-page'>
  
      <section id='error-number'>
      <center>
	  <div class='gambar'>
	  <img src='../../img/lock.png'>
	  </div>
	  </center>
      <h1>MODUL TIDAK DAPAT DIAKSES</h1>
      <center>
      <p class='peringatan'>Untuk mengakses modul, Anda harus konfirmasi ke admin !</p>
	  <img src='../../img/loader.gif'/>
	  </center>
      </section>");
      }
      else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];
// Hapus Pendaftaran
if ($module=='anggota' AND $act=='hapus'){
  mysql_query("DELETE FROM pendaftaran WHERE id_pendaftaran='$_GET[id]'");
  header('location:../../../media.php?module='.$module.'&msg=delete');
}
// Hapus Terseleksi
elseif($module=='anggota' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysql_query("DELETE FROM pendaftaran WHERE id_pendaftaran=$num");
  header('location:../../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../../media.php?module='.$module.'&msg=delete');
	}
}



// Input pendaftaran
elseif ($module=='pendaftaran' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $pass=md5($_POST[password]);
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadUser($nama_file_unik);
  mysql_query("INSERT INTO pendaftaran(nama_siswa,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 gambar,
                                 id_pendaftaran) 
	                       VALUES('$_POST[nama_siswa]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$nama_file_unik',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO pendaftaran_modul SET id_pendaftaran='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
  mysql_query("INSERT INTO pendaftaran(nama_siswa,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 id_pendaftaran) 
	                       VALUES('$_POST[nama_siswa]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO pendaftaran_modul SET id_pendaftaran='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}
}

// Update pendaftaran
elseif ($module=='pendaftaran' AND $act=='update') {

     mysql_query("UPDATE pendaftaran SET terdaftar       = '$_POST[terdaftar]' 
                           WHERE  id_pendaftaran     = '$_POST[id]'");

   header('location:../../media.php?module='.$module.'&msg=update');
  }
   }


?>
