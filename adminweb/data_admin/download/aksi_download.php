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

// Hapus download
if ($module=='download' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT nama_file FROM download WHERE id_download='$_GET[id]'"));
  if ($data[nama_file]!=''){
     mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
     unlink("../../../images/file/$_GET[namafile]");     
  }
  else{
     mysql_query("DELETE FROM download WHERE id_download='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}


// Hapus Yang Terseleksi/////////////////////////////////////////////////////////////////////////
elseif($module=='download' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysql_query("DELETE FROM download WHERE id_download=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}


// Input download
elseif ($module=='download' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="images/dokumen/pdf"; break;
    case "exe": $ctype="images/dokumen/octet-stream"; break;
    case "zip": $ctype="images/dokumen/zip"; break;
    case "rar": $ctype="images/dokumen/rar"; break;
    case "doc": $ctype="images/dokumen/msword"; break;
    case "xls": $ctype="images/dokumen/vnd.ms-excel"; break;
    case "ppt": $ctype="images/dokumen/vnd.ms-powerpoint"; break;
    case "gif": $ctype="images/dokumen/gif"; break;
    case "png": $ctype="images/dokumen/png"; break;
    case "jpeg":
    case "jpg": $ctype="images/dokumen/jpg"; break;
    default: $ctype="images/dokumen/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    mysql_query("INSERT INTO download(judul,
                                    nama_file,
									username,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$nama_file',
								   '$_SESSION[namauser]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
  }
  else{
    mysql_query("INSERT INTO download(judul,
	                                  username,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
							       '$_SESSION[namauser]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module='.$module.'&msg=insert');
  }
}

// Update donwload
elseif ($module=='download' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE download SET judul     = '$_POST[judul]'
                             WHERE id_download = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="images/dokumen/pdf"; break;
    case "exe": $ctype="images/dokumen/octet-stream"; break;
    case "zip": $ctype="images/dokumen/zip"; break;
    case "rar": $ctype="images/dokumen/rar"; break;
    case "doc": $ctype="images/dokumen/msword"; break;
    case "xls": $ctype="images/dokumen/vnd.ms-excel"; break;
    case "ppt": $ctype="images/dokumen/vnd.ms-powerpoint"; break;
    case "gif": $ctype="images/dokumen/gif"; break;
    case "png": $ctype="images/dokumen/png"; break;
    case "jpeg":
    case "jpg": $ctype="images/dokumen/jpg"; break;
    default: $ctype="images/dokumen/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media.php?module=download')</script>";
  }
  else{
    $data_gambar = mysql_query("SELECT nama_file FROM download WHERE id_download='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../anekawebimages/file/'.$r['nama_file']);
    UploadFile($nama_file ,'../../../images/dokumen/');
    mysql_query("UPDATE download SET judul     = '$_POST[judul]',
                                   nama_file    = '$nama_file'   
                             WHERE id_download = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
  }
  }
}
}
?>
