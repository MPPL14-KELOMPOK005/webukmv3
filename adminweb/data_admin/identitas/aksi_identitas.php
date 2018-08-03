<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='../../css/style.default.css' rel='stylesheet' type='text/css'>
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
      </section>";
}
else{

include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update identitas
if ($module=='identitas' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadLogo($nama_file);
    mysql_query("UPDATE identitas SET nama_website   = '$_POST[nama_website]',
                                      titel          = '$_POST[titel]',
                                      meta_deskripsi = '$_POST[meta_deskripsi]',
                                      meta_keyword   = '$_POST[meta_keyword]',
									  email          = '$_POST[email]',
									  tlp            = '$_POST[tlp]',
									  alamat         = '$_POST[alamat]',
									  kepala_sekolah = '$_POST[kepala_sekolah]',
									  nip            = '$_POST[nip]',
									  peta           = '$_POST[peta]',
									  url            = '$_POST[url]',
									  facebook       = '$_POST[facebook]',
									  twitter        = '$_POST[twitter]',
									  user_twitter   = '$_POST[user_twitter]',
                                      favicon        = '$nama_file' 
                                WHERE id_identitas   = '$_POST[id]'");
  }
  else{
  
    mysql_query("UPDATE identitas SET nama_website   = '$_POST[nama_website]',
                                      titel          = '$_POST[titel]',
                                      meta_deskripsi = '$_POST[meta_deskripsi]',
                                      meta_keyword   = '$_POST[meta_keyword]',
									  meta_keyword   = '$_POST[meta_keyword]',
									  email          = '$_POST[email]',
									  tlp            = '$_POST[tlp]',
									  alamat         = '$_POST[alamat]',
									  kepala_sekolah = '$_POST[kepala_sekolah]',
									  nip            = '$_POST[nip]',
									  peta           = '$_POST[peta]',
									  twitter        = '$_POST[twitter]',
									  user_twitter   = '$_POST[user_twitter]',
									  url            = '$_POST[url]',
									  facebook       = '$_POST[facebook]' 
                                WHERE id_identitas   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
