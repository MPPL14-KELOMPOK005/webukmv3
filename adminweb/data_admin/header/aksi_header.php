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

// Hapus header
if ($module=='header' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM header WHERE id_header='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysql_query("DELETE FROM header WHERE id_header='$_GET[id]'");
     unlink("../../../img_anekaweb/header/$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM header WHERE id_header='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
    }

// Hapus terpilih
elseif($module=='header' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysql_fetch_array(mysql_query("SELECT gambar FROM header WHERE id_header=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_anekaweb/header/$data[gambar]");   
} 
mysql_query("DELETE FROM header WHERE id_header=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}

// Input header
elseif ($module=='header' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadHeader($nama_file_unik);

   mysql_query("INSERT INTO header(judul,
                                   tgl_posting,
                                   jam,
								   gambar,
								   username) 
							VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$jam_sekarang',
								   '$nama_file_unik',
								   '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
   mysql_query("INSERT INTO header(judul,
								    tgl_posting,
								    jam,
								    username) 
							VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$jam_sekarang',
								   '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}
// Update header
elseif ($module=='header' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE header SET judul       = '$_POST[judul]' 
                             WHERE id_header   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{
    $data_gambar = mysql_query("SELECT gambar FROM header WHERE id_header='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/header/'.$r['gambar']);
	@unlink('../../../img_anekaweb/header/'.'small_'.$r['gambar']);
    UploadHeader($nama_file_unik ,'../../../img_anekaweb/header/');
    mysql_query("UPDATE header SET judul       = '$_POST[judul]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_header   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
}
}
?>
