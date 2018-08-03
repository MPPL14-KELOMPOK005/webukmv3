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

$module=$_GET[module];
$act=$_GET[act];

// Update watermark
if ($module=='watermark' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE watermark SET judul     = '$_POST[judul]'
                             WHERE id_watermark = '$_POST[id]'");
  }
  else{
    UploadLogo($nama_file);
	$data_gambar= mysql_query("SELECT gambar FROM watermark WHERE id_watermark='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/watermark/'.$r['gambar']);
    UploadLogo($nama_file,'../../../img_anekaweb/watermark/',300,120);

	
    mysql_query("UPDATE watermark SET judul     = '$_POST[judul]',
                                      gambar    = '$nama_file'   
                             WHERE id_watermark = '$_POST[id]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}}
?>
