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

// Input templates
if ($module=='templates' AND $act=='input'){
  mysql_query("INSERT INTO templates(judul,username,pembuat,folder) VALUES('$_POST[judul]', '$_SESSION[namauser]','$_POST[pembuat]','$_POST[folder]')");
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update templates
elseif ($module=='templates' AND $act=='update'){
  mysql_query("UPDATE templates SET judul  = '$_POST[judul]',
                                    pembuat= '$_POST[pembuat]',
                                    folder = '$_POST[folder]'
                              WHERE id_templates = '$_POST[id]'");
   header('location:../../media.php?module='.$module.'&msg=update');
}

// Aktifkan templates
elseif ($module=='templates' AND $act=='aktifkan'){
  $query1=mysql_query("UPDATE templates SET aktif='Ya' WHERE id_templates='$_GET[id]'");
  $query2=mysql_query("UPDATE templates SET aktif='Tidak' WHERE id_templates!='$_GET[id]'");
   header('location:../../media.php?module='.$module.'&msg=aktif');
}
}
?>
