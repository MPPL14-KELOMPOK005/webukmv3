<?php
include "../config/koneksi.php";
$no_daftar = $_POST['no_daftar'];
$pass     = md5($_POST['password']);

$login=mysql_query("SELECT * FROM pendaftaran WHERE no_daftar='$no_daftar' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  

  $_SESSION[member_namauser]     = $r[no_daftar];
  $_SESSION[member_namasiswa]    = $r[nama_mahasiswa];
  $_SESSION[member_passuser]     = $r[password];
  $_SESSION[member_ukm]    		 = $r[pilihukm];
  $_SESSION[member_status]    	 = $r[terdaftar];
  $_SESSION[member_id]           = $r[id_pendaftaran];
  
  
  header('location:../media.php?module=profil');
  }

else{
 echo"<script>alert('Login gagal.Username atau password anda tidak benar. Atau akun anda sedang diblokir.')</script>";
	echo"<script>document.location.href='javascript:history.go(-1)';</script>";
	
}
?>

