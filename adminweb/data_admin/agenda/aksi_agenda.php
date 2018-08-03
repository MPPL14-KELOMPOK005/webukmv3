<?php
session_start();
      if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
echo "<link href='../../css/style.default.css' rel='stylesheet' type='text/css'>
      <body class='special-page'>
  
      <section id='error-number'>
      <center>
	  <div class='gambar'>
	  <img src='../../img/lock.png'>
	  </div>
	  </center>
      <h1>MODUL TIDAK DAPAT DIAKSES</h1>
      <center>
      <p class='peringatan'>Untuk mengakses modul, Anda harus konfirmasi ke admin !</p>
	  <img src='../../img/loader.gif'/>
	  </center>
      </section>";
	  } 
      else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus agenda
if ($module=='agenda' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM ukm WHERE id_ukm='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM ukm WHERE id_ukm='$_GET[id]'");
     unlink("../../../img_anekaweb/ukm/$_GET[namafile]");   
     unlink("../../../img_anekaweb/ukm/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM ukm WHERE id_ukm='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module.'&msg=delete');
}

// Hapus terpilih
elseif($module=='agenda' AND $act=='hapussemua'){
if(isset($_POST['cek'])){
foreach($_POST['cek'] as $cek => $num){
$data=mysql_fetch_array(mysql_query("SELECT gambar FROM ukm WHERE id_ukm=$num"));
  if ($data['gambar']!=''){
     unlink("../../../img_anekaweb/ukm/$data[gambar]");   
     unlink("../../../img_anekaweb/ukm/small_$data[gambar]");  
} 
mysql_query("DELETE FROM ukm WHERE id_ukm=$num");
  header('location:../../media.php?module='.$module.'&msg=delete');
}
} else {
  header('location:../../media.php?module='.$module.'&msg=delete');
}
}



// Input agenda
elseif ($module=='agenda' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];
  
  $tema_seo = seo_title($_POST['tema']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadAgenda($nama_file_unik);
    mysql_query("INSERT INTO ukm(tema,
                                  tema_seo, 
                                  isi_ukm,
                                  tgl_posting,
								  hari,
                                  pengirim,
                                  gambar, 
                                  username) 
					VALUES('$_POST[tema]',
					             '$tema_seo', 
                                 '$_POST[isi_ukm]',
                                 '$tgl_sekarang',
								 '$hari_ini',
                                 '$_POST[pengirim]',
                                 '$nama_file_unik',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
  else{
    mysql_query("INSERT INTO ukm(tema,
                                  tema_seo, 
                                  isi_ukm,
                                  tgl_posting,
								  hari,
                                  pengirim,
                                  username) 
					      VALUES('$_POST[tema]',
					             '$tema_seo', 
                                 '$_POST[isi_ukm]',
                                 '$tgl_sekarang',
								 '$hari_ini',
                                 '$_POST[pengirim]',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update agenda
elseif ($module=='agenda' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 


  $tema_seo = seo_title($_POST['tema']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  mysql_query("UPDATE ukm SET tema        = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_ukm  = '$_POST[isi_ukm]',  
                                 pengirim    = '$_POST[pengirim]'  
                           WHERE id_ukm   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
    }
    else{
	
	$data_gambar = mysql_query("SELECT gambar FROM ukm WHERE id_ukm='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../img_anekaweb/ukm/'.$r['gambar']);
	@unlink('../../../img_anekaweb/ukm/'.'small_'.$r['gambar']);
    UploadAgenda($nama_file_unik,'../../../img_anekaweb/ukm/');
	
  
    mysql_query("UPDATE ukm SET tema      = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_ukm  = '$_POST[isi_ukm]',
                                 gambar      = '$nama_file_unik', 
                                 pengirim    = '$_POST[pengirim]'  
                           WHERE id_ukm   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
?>
