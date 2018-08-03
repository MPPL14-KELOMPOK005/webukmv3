<?php

$cek=umenu_akses("?module=agenda",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=agenda'><span class='icon-list-alt'></span>Daftar UKM</a></li>";
}
$cek=umenu_akses("?module=pengumuman",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=pengumuman'><span class='icon-list-alt'></span>Pengumuman</a></li>";
}


?>
