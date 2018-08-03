<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Profil
if ($_GET[module]=='profilpengurus'){
  include "modul/mod_profil/profil.php";
}
if ($_GET[module]=='anggota'){
  include "modul/mod_profil/anggota.php";
}
if ($_GET[module]=='jadwalpengurus'){
  include "modul/mod_profil/jadwal.php";
}
if ($_GET[module]=='calonanggota'){
  include "modul/mod_profil/calonanggota.php";
}
?>
