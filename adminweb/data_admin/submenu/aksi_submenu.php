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

$module=$_GET[module];
$act=$_GET[act];

// Hapus sub menu
if ($module=='submenu' AND $act=='hapus'){
  mysql_query("DELETE FROM submenu WHERE id_sub='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}

// Input sub menu
elseif ($module=='submenu' AND $act=='input'){
    mysql_query("INSERT INTO submenu(nama_sub,
                                    id_main,
									username,
                                    link_sub) 
                            VALUES('$_POST[nama_sub]',
                                   '$_POST[menu_utama]',
								   '$_SESSION[namauser]',
                                   '$_POST[link_sub]')");
 header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update sub menu
elseif ($module=='submenu' AND $act=='update'){
    mysql_query("UPDATE submenu SET nama_sub  = '$_POST[nama_sub]',
                                   id_main = '$_POST[menu_utama]',
                                   link_sub  = '$_POST[link_sub]'  
                             WHERE id_sub   = '$_POST[id]'");
  header('location:../../media.php?module='.$module.'&msg=update');
}
}
?>
