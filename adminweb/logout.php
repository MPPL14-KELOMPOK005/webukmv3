<?php
include "../config/koneksi.php";
  $iden=mysql_fetch_array(mysql_query("SELECT url FROM identitas"));
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '$iden[url]'</script>";
?>