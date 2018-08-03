<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update pendaftaran
if ($module=='profilpengurus' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

	$data_gambar = mysql_query("SELECT gambar FROM pengurus WHERE id_pendaftaran=$_SESSION[pengurus_id]");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/profil/'.$r['gambar']);
	@unlink('../../../img_anekaweb/profil/'.'small_'.$r['gambar']);
    UploadProfil($nama_file_unik ,'../../../img_anekaweb/profil/');
    mysql_query("UPDATE pengurus SET gambar         = '$nama_file_unik'  
                               WHERE id_pendaftaran    = $_SESSION[pengurus_id]");
 
   header('location:../../../media.php?module='.$module);

}
?>
