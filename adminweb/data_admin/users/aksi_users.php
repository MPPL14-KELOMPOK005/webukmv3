<?php
      session_start();
      if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
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




// Input user
if ($module=='user' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $data=md5($_POST[password]);
  $pass=hash("sha512",$data);
  
  // Apabila ada foto yang diupload
  if (!empty($lokasi_file)){
    UploadUser($nama_file_unik);
  mysql_query("INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 profil,
                                 email, 
                                 no_telp,
								 foto,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[profil]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$nama_file_unik',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module);
  }
  else{
  mysql_query("INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 profil,
                                 email, 
                                 no_telp,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[profil]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$pass')");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$pass',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module);
}
}

// Update user
elseif ($module=='user' AND $act=='update') {
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  // Apabila foto tidak diganti
  if($_POST[password]!=''){
  $data=md5($_POST[password]);
  $pass=hash("sha512",$data);
  if (empty($lokasi_file)){
    mysql_query("UPDATE users SET password       = '$pass',
								  nama_lengkap   = '$_POST[nama_lengkap]',
								  profil         = '$_POST[profil]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_session     = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
  header('location:../../media.php?module='.$module);
  }
  // Apabila password diubah
  else{
	$data_foto = mysql_query("SELECT foto FROM users WHERE id_session='$_POST[id]'");
	$r    	= mysql_fetch_array($data_foto);
	@unlink('../../../img_anekaweb/user/'.$r['foto']);
	@unlink('../../../img_anekaweb/user/'.'small_'.$r['foto']);
    UploadUser($nama_file_unik ,'../../../img_anekaweb/user/');
    mysql_query("UPDATE users SET password        = '$pass',
                                  nama_lengkap    = '$_POST[nama_lengkap]',
                                  profil          = '$_POST[profil]',
                                  email           = '$_POST[email]',  
                                  blokir          = '$_POST[blokir]', 
								  foto            = '$nama_file_unik', 
                                  no_telp         = '$_POST[no_telp]'  
                            WHERE id_session      = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
  }
  } else {
  if (empty($lokasi_file)){
  mysql_query("UPDATE users SET   nama_lengkap   = '$_POST[nama_lengkap]',
  								  profil         = '$_POST[profil]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_session     = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
header('location:../../media.php?module='.$module);
  }
  // Apabila password diubah
  else{
	$data_foto = mysql_query("SELECT foto FROM users WHERE id_session='$_POST[id]'");
	$r    	= mysql_fetch_array($data_foto);
	@unlink('../../../img_anekaweb/user/'.$r['foto']);
	@unlink('../../../img_anekaweb/user/'.'small_'.$r['foto']);
    UploadUser($nama_file_unik ,'../../../img_anekaweb/user/');
    mysql_query("UPDATE users SET nama_lengkap    = '$_POST[nama_lengkap]',
  								  profil         = '$_POST[profil]',
                                  email           = '$_POST[email]',  
                                  blokir          = '$_POST[blokir]', 
								  foto            = '$nama_file_unik', 
                                  no_telp         = '$_POST[no_telp]'  
                            WHERE id_session      = '$_POST[id]'");
  $mod=count($_POST['modul']);
  $modul=$_POST['modul'];
  for($i=0;$i<$mod;$i++){
  	mysql_query("INSERT INTO users_modul SET id_session='$_POST[id]',id_modul='$modul[$i]'");
  }
  }
  }
  header('location:../../media.php?module='.$module);
}


 //hapus module
elseif($module=='user' AND $act=='hapusmodule'){
$id=abs((int)$_GET['id']);
mysql_query("DELETE FROM users_modul WHERE id_umod=$id");
header('location:../../media.php?module='.$module.'&act=edituser&id='.$_GET[sessid]);
}

}
?>
