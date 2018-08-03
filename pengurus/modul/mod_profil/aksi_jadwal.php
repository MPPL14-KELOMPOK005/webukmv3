<?php
session_start();
      if (empty($_SESSION['pengurus_id']) AND empty($_SESSION['member_passuser'])){
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

// Hapus Jadal
if ($module=='jadwalpengurus' AND $act=='hapus'){
  mysql_query("DELETE FROM jadwal WHERE id_jadwal='$_GET[id]'");
  header('location:../../../media.php?module='.$module.'&msg=delete');
}

// Hapus Terseleksi
elseif($module=='jadwalpengurus' AND $act=='hapussemua'){
	if(isset($_POST['cek'])){
	foreach($_POST['cek'] as $cek => $num){
		mysql_query("DELETE FROM jadwal WHERE id_jadwal=$num");
  header('location:../../../media.php?module='.$module.'&msg=delete');
	}
	} else {
  header('location:../../../media.php?module='.$module.'&msg=delete');
	}
}


// Input profil_guru
elseif ($module=='jadwalpengurus' AND $act=='input'){
 
  mysql_query("INSERT INTO jadwal(nama_kegiatan,
                                    tempat,
                                    tanggal,
									jam,
									keterangan,
                                    ukm
									) 
                            VALUES('$_POST[namakegiatan]',
                                   '$_POST[tempat]',
                                   '$_POST[tanggal]',
                                   '$_POST[waktu]',
                                   '$_POST[keterangan]',
								   '$_SESSION[pengurus_ukm]')");
  header('location:../../../media.php?module='.$module);
  }


// Update profil_guru
elseif ($module=='jadwalpengurus' AND $act=='update'){
  

 mysql_query("UPDATE jadwal SET    nama_kegiatan    = '$_POST[namakegiatan]',
                                   tempat           = '$_POST[tempat]', 
                                   tanggal          = '$_POST[tanggal]', 
                                   jam              = '$_POST[waktu]',   
                                   keterangan       = '$_POST[keterangan]'  
                             WHERE id_jadwal   		=  $_POST[id]");
  header('location:../../../media.php?module='.$module);
    
  }
}
?>
