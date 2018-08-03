<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Profil
if ($_GET[module]=='profil'){
  include "modul/mod_profil/profil.php";
}
if ($_GET[module]=='jadwal'){
  include "modul/mod_profil/jadwal.php";
}
?>
