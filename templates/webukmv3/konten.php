<?php
if ($_GET['module']=='home'){
	include "modul/beranda.php";
}
if ($_GET['module']=='pengumuman'){
	include "modul/pengumuman/pengumuman.php";
}
if ($_GET['module']=='ukm'){
	include "modul/ukm/ukm.php";
}
if ($_GET['module']=='detailukm'){
	include "modul/ukm/detailukm.php";
}
if ($_GET['module']=='detailpengumuman'){
	include "modul/pengumuman/detailpengumuman.php";
}
if ($_GET['module']=='berita'){
	include "modul/berita/berita.php";
}
if ($_GET['module']=='detailberita'){
	include "modul/berita/detailberita.php";
}
if ($_GET['module']=='agenda'){
	include "modul/agenda/agenda.php";
}
if ($_GET['module']=='halamanstatis'){
	include "modul/halaman/halaman.php";
}
if ($_GET['module']=='detailagenda'){
	include "modul/agenda/detailagenda.php";
}
if ($_GET['module']=='lihatpoling'){
	include "modul/poling/lihatpoling.php";
}
if ($_GET['module']=='hasilpoling'){
	include "modul/poling/hasilpoling.php";
}
if ($_GET['module']=='detailkategoriberita'){
	include "modul/berita/kategoriberita.php";
}
if ($_GET['module']=='galerifoto'){
	include "modul/galeri/galerifoto.php";
}
if ($_GET['module']=='detailgalerifoto'){
	include "modul/galeri/detailgalerifoto.php";
}
if ($_GET['module']=='galerivideo'){
	include "modul/video/galerivideo.php";
}
if ($_GET['module']=='detailgalerivideo'){
	include "modul/video/detailgalerivideo.php";
}
if ($_GET['module']=='hubungi'){
	include "modul/kontak/hubungi.php";
}
if ($_GET['module']=='hasilpencarian'){
	include "modul/berita/pencarian.php";
}
if ($_GET['module']=='hubungiaksi'){
	include "modul/kontak/hubungiaksi.php";
}
if ($_GET['module']=='notfound'){
	include "modul/404/404.php";
}
if ($_GET['module']=='download'){
	include "modul/download/download.php";
}
if ($_GET['module']=='jadwal'){
	include "modul/jadwal/jadwal.php";
}
if ($_GET['module']=='pengajar'){
	include "modul/pengajar/pengajar.php";
}
if ($_GET['module']=='pendaftaran'){
	include "modul/pendaftaran/pendaftaran.php";
}
if ($_GET['module']=='prosesdaftar'){
	include "modul/pendaftaran/prosesdaftar.php";
}
if ($_GET['module']=='lupapassword'){
	include "modul/pendaftaran/lupapassword.php";
}
if ($_GET['module']=='kirimpassword'){
	include "modul/pendaftaran/kirimpassword.php";
}
if ($_GET['module']=='datasiswa'){
	include "modul/pendaftaran/datasiswa.php";
}
if ($_GET['module']=='profil'){
	include "member/modul/mod_profil/profil.php";
}
if ($_GET['module']=='profilpengurus'){
	include "pengurus/modul/mod_profil/profil.php";
}
if ($_GET['module']=='anggota'){
	include "pengurus/modul/mod_profil/anggota.php";
}
if ($_GET['module']=='calonanggota'){
	include "pengurus/modul/mod_profil/calonanggota.php";
}
if ($_GET[module]=='jadwalpengurus'){
  include "pengurus/modul/mod_profil/jadwal.php";
}
if ($_GET['module']=='hasillulusadministrasi'){
	include "modul/pendaftaran/lulus-administrasi.php";
}
if ($_GET['module']=='hasilkelulusansiswa'){
	include "modul/pendaftaran/kelulusan-siswa.php";
}
?>
