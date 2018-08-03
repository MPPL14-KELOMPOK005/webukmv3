      <?php
      session_start();
      if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
      //Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
      if(count(get_included_files())==1)
      {
echo "<meta http-equiv='refresh' content='3; url=http://$_SERVER[HTTP_HOST]'>";
	  exit("<link href='../../css/style.default.css' rel='stylesheet' type='text/css'>
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
      </section>");
      }
	  } 
      else{
	  
///// cek hak akses user ////////////////////////////////////////////////////////////////////

	  $cek=user_akses($_GET[module],$_SESSION[sessid]);
	  if($cek==1 OR $_SESSION[leveluser]=='admin'){
	
	  $aksi="data_admin/profil/aksi_profil.php";
	  switch($_GET[act]){
	  // Tampil welcome
	   default:
	   
///// Welcome UPDATE /////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update profil.
      </div>";}
	  
      $sql  = mysql_query("SELECT * FROM profil WHERE id_profil");
      $r    = mysql_fetch_array($sql);
	
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Profil</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=profil&act=update' enctype='multipart/form-data' class='stdform'>
      <input type=hidden name=id value=$r[id_profil]>
	  
	  <p> 
      <label>Judul</label>
	  <span class='field'>
      <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
      </p> 	
	  
	  <p> 
	  <label>Isi Profil</label>
	  <span class='field'>
	  <textarea id='anekaweb' name='isi_profil' cols='80' rows='10' class='span5'>$r[isi_profil]</textarea>
	  </span>
	  </p>";
	  
echo "<p> 
      <label>Gambar</label> ";
      if ($r[gambar]!=''){
echo "<img src='../img_anekaweb/profil/small_$r[gambar]' width=100>
      </p>";
	  } 	  

echo "<p> 
      <label>Upload Gambar</label>
	  <span class='field'>
      <input type=file name='fupload'>
	  </span>
      </p>";
	  
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      </p>
	  </form>
	  </div>
	  </div>";
	
    break;

   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
?>
