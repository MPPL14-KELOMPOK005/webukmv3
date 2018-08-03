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
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Update welcome
if ($module=='welcome' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE welcome SET judul        = '$_POST[judul]',
	                                welcome      = '$_POST[welcome]'  
                              WHERE id_welcome   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{
   $data_gambar = mysql_query("SELECT gambar FROM welcome WHERE id_welcome='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../images/welcome/'.$r['gambar']);
	@unlink('../../../images/welcome/'.'small_'.$r['gambar']);
    UploadWelcome($nama_file_unik ,'../../../images/welcome/');
    mysql_query("UPDATE welcome SET judul        = '$_POST[judul]',
	                                welcome  = '$_POST[welcome]',
                                    gambar       = '$nama_file_unik'   
                              WHERE id_welcome   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
}
}
?>
