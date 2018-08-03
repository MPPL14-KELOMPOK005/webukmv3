	<?php

	 if(isset($_SESSION[member_id])){
	 $sql  = mysql_query("SELECT * FROM pendaftaran WHERE id_pendaftaran=$_SESSION[member_id]");
	 $r=mysql_fetch_array($sql);
echo"<li class='widget widget_archive'>
     <div class='page-title2'>AKUN ANGGOTA</div>
	 <div class='page-title2'>$r[nama_mahasiswa]</div>
     <ul>
	 <li><a href='media.php?module=profil'>Profil Anda</a></li>
	 <li><a href='media.php?module=jadwal'>Jadwal Kegiatan</a></li>
     <li><a href='lupa-password.html'>Lupa Password</a></li>
     <li><a href='logout.php'>Keluar</a></li>
     </ul>
     </li>";
	 }
	 elseif(isset($_SESSION[pengurus_id])){
		 echo"<li class='widget widget_archive'>
     <div class='page-title2'>AKUN PENGURUS</div>
	 <div class='page-title2'>$r[nama_mahasiswa]</div>
     <ul>
	 <li><a href='media.php?module=profilpengurus'>Profil Anda</a></li>
	 <li><a href='media.php?module=anggota'>Anggota</a></li>
	 <li><a href='media.php?module=calonanggota'>Calon Anggota</a></li>
	 <li><a href='media.php?module=jadwalpengurus'>Buat Kegiatan</a></li>
     <li><a href='lupa-password.html'>Lupa Password</a></li>
     <li><a href='logout.php'>Keluar</a></li>
     </ul>
     </li>";
	 }
	 else{
echo"<li class='widget widget_archive'><div class='page-title2'>LOGIN ANGGOTA</div>
      <ul>
     <div class='login-form'>
     <form method='post' action='member/cek_login.php'>
     <input required type='text' name='no_daftar'  placeholder='ID Anggota'>
     <input required type='password' name='password'  placeholder='Password'>
     <input type='submit' value='LOGIN'>
     </form>
     </div>
     <div class='lupa-password'><a href='lupa-password.html'>Lupa Password</a></div>
	 </ul>
     </li>
	 
	 <li class='widget widget_archive'><div class='page-title2'>LOGIN PENGURUS</div>
      <ul>
     <div class='login-form'>
     <form method='post' action='pengurus/cek_login.php'>
     <input required type='text' name='no_daftar'  placeholder='ID Pengurus'>
     <input required type='password' name='password'  placeholder='Password'>
     <input type='submit' value='LOGIN'>
     </form>
     </div>
     <div class='lupa-password'><a href='lupa-password.html'>Lupa Password</a></div>
	 </ul>
     </li>";
	 }
?>