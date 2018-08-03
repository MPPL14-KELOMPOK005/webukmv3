<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "webukmv3";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("");
mysql_select_db($database) or die("");


// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new validasi;
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

?>
