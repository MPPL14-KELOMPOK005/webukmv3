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
	  
//// cek hak akses user ////////////////////////////////////////////////////////////

      $cek=user_akses($_GET[module],$_SESSION[sessid]);
      if($cek==1 OR $_SESSION[leveluser]=='admin'){	  
	  
      $aksi="data_admin/welcome/aksi_welcome.php";
      switch($_GET[act]){
      default:
  
	
///// PESAN UPDATE ////////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Selamat Datang.
      </div>";}
  
      $sql  = mysql_query("SELECT * FROM welcome LIMIT 1");
      $r    = mysql_fetch_array($sql);

  
echo "<div class='maincontent'>
      <div class='contentinner'>
      <h4 class='widgettitle nomargin'>Selamat Datang</h4>
      <div class='widgetcontent bordered'>
      <div class='row-fluid'>
   
      <form method=POST enctype='multipart/form-data' action=$aksi?module=welcome&act=update class='stdform'>
      <input type=hidden name=id value=$r[id_welcome]>
  
	  <p> 
      <label>Judul</label>
	  <span class='field'>
      <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
      </p> 	
	  
	  <p> 
      <label>Selamat Datang</label>
	  <span class='field'>
	  <textarea  id='anekaweb' name='welcome' cols='80' rows='10' class='span5'>$r[welcome]</textarea>
      </p> 
	
	
      <p> 
      <label>Gambar</label>";
      if ($r[gambar]!=''){
echo "<img src=../img_anekaweb/welcome/small_$r[gambar] width=100>
      </p>"; 
	  }
	  
echo "<p> 
      <label>Upload Gambar</label>
	  <span class='field'>
      <input type='file' name='fupload' />
	  <span class style=\"color:#EA1C1C;\">ukuran welcome 800x600px
	  </span>
      </p>";

echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      </p>
	  
      </form>
      </div>
	  </div>";
	  
	  break;
	  }
	  } 
	  else {
echo akses_salah();
     }
     }
     ?>


