<?php
session_start();
include "../config/koneksi.php";


$username = anti_injection($_POST['username']);
$data     = anti_injection(md5($_POST['password']));
$pass=hash("sha512",$data);
  
// pastikan username dan password adalah berupa huruf atau angka.		
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
echo "<link href='css/style.default.css' rel='stylesheet' type='text/css'>
      <body class='special-page'>
  
      <section id='error-number'>
      <center>
	  <div class='gambar'>
	  <img src='img/lock.png'>
	  </div>
	  </center>
      <h1>LOGIN GAGAL</h1>
      <center>
      <p class='peringatan'>Username atau Password anda tidak sesuai.<br>
      Atau akun anda sedang diblokir. !</p>
	  <p><a class='btn btn-primary' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
	  </center>
      </section>";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../img_anekaweb/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[email] 	      = $r[email];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[sessid]       = $r[id_session];
  $_SESSION[leveluser]    = $r[level];

  header('location:media.php?module=home');
}
else{

   echo "<link href='css/style.default.css' rel='stylesheet' type='text/css'>
      <body class='special-page'>
  
      <section id='error-number'>
      <center>
	  <div class='gambar'>
	  <img src='img/lock.png'>
	  </div>
	  </center>
      <h1>LOGIN GAGAL</h1>
      <center>
      <p class='peringatan'>Username atau Password anda tidak sesuai.<br>
      Atau akun anda sedang diblokir. !</p>
	  <p><a class='btn btn-primary' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
	  </center>
      </section>";

}
}
?>