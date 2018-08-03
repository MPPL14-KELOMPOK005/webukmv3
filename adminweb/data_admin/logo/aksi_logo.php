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

// Hapus logo
if ($module=='logo' AND $act=='hapus'){
  mysql_query("DELETE FROM logo WHERE id_logo='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}

// Input logo
elseif ($module=='logo' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadlogo($nama_file);
    mysql_query("INSERT INTO logo(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO logo(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update logo
elseif ($module=='logo' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_logo = '$_POST[id]'");
  }
  else{
    UploadLogo($nama_file);
	$data_gambar= mysql_query("SELECT gambar FROM logo WHERE id_logo='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/logo/'.$r['gambar']);
    UploadLogo($nama_file,'../../../img_anekaweb/logo/',300,120);

	
    mysql_query("UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_logo = '$_POST[id]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}}
?>
