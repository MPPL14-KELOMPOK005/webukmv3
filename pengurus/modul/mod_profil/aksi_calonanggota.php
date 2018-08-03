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




// Update pendaftaran
elseif ($module=='calonanggota' AND $act=='terima') {
$id = $_GET['id'];
     mysql_query("UPDATE pendaftaran SET terdaftar       = 'Diterima' 
                           WHERE  id_pendaftaran     	 = '$id'");

   header('location:../../../media.php?module='.$module.'&msg=update');
  }
   }


?>
