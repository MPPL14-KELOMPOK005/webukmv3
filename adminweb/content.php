   <?php
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";

   // Bagian Home
   if ($_GET['module']=='home'){
   if ($_SESSION['leveluser']=='admin'){
   $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
 echo "
  
   <div class='pagetitle'><h1>Selamat Datang <b>$_SESSION[namalengkap]</b> di Halaman Administrator <b>$iden[nama_website].</b></h1> </div>
   <div class='maincontent'>
   <div class='contentinner content-dashboard'>
   
   <div class='alert alert-info'>
      <button type='button' class='close' data-dismiss='alert'></button>
      Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda atau pilih ikon-ikon pada Control Panel di bawah ini.
      </div>
   <!--alert-->";
   
   include "statistik.php";	
					
   

      }
	  } 
   

  // Bagian Menu Utama
  elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/menuutama/menuutama.php";}}
  //
  // Bagian Menu Kategori
  elseif ($_GET['module']=='menukategori'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/menukategori/menukategori.php";}}
  
  // Bagian Menu Kategori
  elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/submenu/submenu.php";}}
  
  
  // Bagian User
  elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/profil/profil.php";}}
  
  // Bagian Profil Guru
  elseif ($_GET['module']=='profilguru'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/profilguru/profilguru.php";}}
  
  // Bagian Agenda
  elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/agenda/agenda.php";}}

  // Bagian User
  elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/users/users.php"; }}

  // Bagian Modul
  elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/modul/modul.php";}}
  
  // Bagian Kategori berita
  elseif ($_GET['module']=='kategoriberita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/kategoriberita/kategoriberita.php";}}
  

  // Bagian berita
  elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/berita/berita.php"; }}
  

  // Bagian Poling
  elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/poling/poling.php";}}

  // Bagian Hubungi Kami
  elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/hubungi/hubungi.php";}}

  // Bagian Templates
  elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/templates/templates.php";}}


  // Bagian Halaman Statis
  elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/halamanstatis/halamanstatis.php";}}


  // Bagian Logo
  elseif ($_GET[module]=='logo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/logo/logo.php";}}
  
  // Bagian Watermark Logo
  elseif ($_GET[module]=='watermark'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/watermark/watermark.php";}}

  // Bagian Galeri Foto
  elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/galerifoto/galerifoto.php";}}
  
  // Bagian Album
  elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/album/album.php";}}
  
  // Bagian Pengumuman
  elseif ($_GET['module']=='pengumuman'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/pengumuman/pengumuman.php";}}
  
  // Bagian video
  elseif ($_GET['module']=='video'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
  include "data_admin/video/video.php";}}
  

  // Bagian Identitas Website
  elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
   include "data_admin/identitas/identitas.php";}}
 
   // Bagian Header
  elseif ($_GET[module]=='header'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/header/header.php";}} 
  
   // Bagian Iklan Home
  elseif ($_GET[module]=='welcome'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/welcome/welcome.php";}} 
  
  // Bagian Download
  elseif ($_GET[module]=='download'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/download/download.php";}}
  
  // Bagian Link Terkait
  elseif ($_GET[module]=='link'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/link/link.php";}}
  
  // Bagian Pendaftaran
  elseif ($_GET[module]=='pendaftaran'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/pendaftaran/pendaftaran.php";}}
  
  // Bagian Hasil Lulus Administrasi
  elseif ($_GET[module]=='hasillulusadministrasi'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "data_admin/pendaftaran/hasillulusadministrasi.php";}}
  
  
  // Apabila modul tidak ditemukan
  else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";}


  ?>
