<?php
include "../config/koneksi.php";
$no_daftar = $_POST['no_daftar'];
$pass     = md5($_POST['password']);

$login=mysql_query("SELECT * FROM pengurus WHERE no_daftar='$no_daftar' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  

  $_SESSION[member_namauser]     = $r[no_daftar];
  $_SESSION[member_namasiswa]    = $r[nama_mahasiswa];
  $_SESSION[member_passuser]     = $r[password];
  $_SESSION[pengurus_ukm]        = $r[pilihukm];
  $_SESSION[pengurus_level]      = 'pengurus';
  $_SESSION[pengurus_id]         = $r[id_pendaftaran];
  
  
  header('location:../media.php?module=profilpengurus');
  }

else{
 echo"<script>alert('Login gagal.Username atau password anda tidak benar. Atau akun anda sedang diblokir.')</script>";
	echo"<script>document.location.href='javascript:history.go(-1)';</script>";
	
}
?>

