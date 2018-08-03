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

// Hapus link
if ($module=='link' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM link WHERE id_link='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysql_query("DELETE FROM link WHERE id_link='$_GET[id]'");
     unlink("../../../img_anekaweb/link/$_GET[namafile]");    
  }
  else{
     mysql_query("DELETE FROM link WHERE id_link='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
    }

// Hapus terpilih
elseif($module=='link' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysql_fetch_array(mysql_query("SELECT gambar FROM link WHERE id_link=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_anekaweb/link/$data[gambar]");   
} 
mysql_query("DELETE FROM link WHERE id_link=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}

// Input link
elseif ($module=='link' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadLink($nama_file);

   mysql_query("INSERT INTO link(judul,
                                   tgl_posting,
                                   link,
								   gambar,
								   username) 
							VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
								   '$_POST[link]',
								   '$nama_file',
								   '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  else{
   mysql_query("INSERT INTO link(judul,
								  link,
								  tgl_posting,
								  username) 
						  VALUES('$_POST[judul]',
								 '$_POST[link]',
								 '$tgl_sekarang',
								 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}
// Update link
elseif ($module=='link' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE link SET judul       = '$_POST[judul]',
	                             link        = '$_POST[link]'
                             WHERE id_link   = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{
    UploadLink($nama_file);
    $data_gambar = mysql_query("SELECT gambar FROM link WHERE id_link='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/link/'.$r['gambar']);
    UploadLink($nama_file ,'../../../img_anekaweb/link/');
    mysql_query("UPDATE link SET judul     = '$_POST[judul]',
								 link      = '$_POST[link]',  
                                 gambar    = '$nama_file'   
                             WHERE id_link = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
}
}
?>
