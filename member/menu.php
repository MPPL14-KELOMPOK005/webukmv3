<?php
include "../config/koneksi.php";

if ($_SESSION[leveluser]=='pendaftaran' OR $_SESSION[leveluser]=='admin'){
  $sql=mysql_query("select * from modul where status='pendaftaran' and aktif='Y' order by urutan");
}
else {
  //echo"<script>alert('Akses Tidak diijinkan!')</script>";
  echo"<script>document.location.href='../index.php';</script>";
  
}

echo"<table class=tablestyle><tr class=noborder>";
$i=0;
$kolom=2;
while($m=mysql_fetch_array($sql)){
if($i >= $kolom){
echo"</tr><tr class=noborder>";
$i=0;
}
$i++;
echo"<td align=center width='200' class=noborder><a href='$m[link]'><img src='../editweb/foto_banner/$m[gambar]' border='0'></a><br>$m[nama_modul]</td>";
}
echo"</tr></table>";
?>
