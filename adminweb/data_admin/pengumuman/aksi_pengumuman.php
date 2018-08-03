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

// Hapus pengumuman
if ($module=='pengumuman' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM pengumuman WHERE id_pengumuman='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
     unlink("../../../img_anekaweb/pengumuman/$_GET[namafile]");   
     unlink("../../../img_anekaweb/pengumuman/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}

// Hapus terpilih
elseif($module=='pengumuman' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysql_fetch_array(mysql_query("SELECT gambar FROM pengumuman WHERE id_pengumuman=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_anekaweb/pengumuman/$data[gambar]");   
     unlink("../../../img_anekaweb/pengumuman/small_$data[gambar]");  
} 
mysql_query("DELETE FROM pengumuman WHERE id_pengumuman=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input pengumuman
elseif ($module=='pengumuman' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $tema_seo = seo_title($_POST['tema']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadPengumuman($nama_file_unik);
    mysql_query("INSERT INTO pengumuman(tema,
                                  tema_seo, 
                                  isi_pengumuman,
                                  tgl_posting,
                                  gambar, 
                                  username) 
					VALUES('$_POST[tema]',
					             '$tema_seo', 
                                 '$_POST[isi_pengumuman]',
                                 '$tgl_sekarang',
                                 '$nama_file_unik',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
  else{
    mysql_query("INSERT INTO pengumuman(tema,
                                  tema_seo, 
                                  isi_pengumuman,
                                  tgl_posting,
                                  username) 
					      VALUES('$_POST[tema]',
					             '$tema_seo', 
                                 '$_POST[isi_pengumuman]',
                                 '$tgl_sekarang',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update pengumuman
elseif ($module=='pengumuman' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $tema_seo = seo_title($_POST['tema']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  mysql_query("UPDATE pengumuman SET tema        = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_pengumuman  = '$_POST[isi_pengumuman]' 
                           WHERE id_pengumuman   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
    }
    else{
	
	$data_gambar = mysql_query("SELECT gambar FROM pengumuman WHERE id_pengumuman='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/pengumuman/'.$r['gambar']);
	@unlink('../../../img_anekaweb/pengumuman/'.'small_'.$r['gambar']);
    UploadPengumuman($nama_file_unik,'../../../img_anekaweb/pengumuman/');
	
  
    mysql_query("UPDATE pengumuman SET tema      = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_pengumuman  = '$_POST[isi_pengumuman]',
                                 gambar      = '$nama_file_unik' 
                           WHERE id_pengumuman   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
?>
