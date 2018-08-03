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
	  
      $aksi="data_admin/identitas/aksi_identitas.php";
      switch($_GET[act]){
      default:
  
	
///// PESAN UPDATE ////////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Identitas Website.
      </div>";}
  
      $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
      $r    = mysql_fetch_array($sql);

  
echo "<div class='maincontent'>
      <div class='contentinner'>
      <h4 class='widgettitle nomargin'>Konfigurasi Website</h4>
      <div class='widgetcontent bordered'>
      <div class='row-fluid'>
   
      <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update class='stdform'>
      <input type=hidden name=id value=$r[id_identitas]>
  
      <p>
      <label>Nama Website</label>
      <span class='field'>
	  <input type='text' name='nama_website' value='$r[nama_website]' class='input-xxlarge' /></span>
      </p>
	 
      <p> 
      <label>URL</label>
      <span class='field'>
	  <input type=text name='url' value='$r[url]' class='input-xxlarge' /></span>
      <label></label>Apabila di-onlinekan di web hosting, ganti URL dengan URL website anda.
      contoh: <span class style=\"color:#245689;\">http://anekaweb.com</span>
      </p> 
      
	  
      <p> 
      <label>FB FanPage</label>
      <span class='field'>
      <input type=text name='facebook' value='$r[facebook]' class='input-xxlarge' /></span>
      <label></label>contoh: <span class style=\"color:#245689;\">https://www.facebook.com/pages/AnekaWeb/204766189644964</span>
      </p>
	  
      <p> 
      <label>Titel</label>
	  <span class='field'>
      <input type=text name='titel' value='$r[titel]' class='input-xxlarge' /></span>
      </p> 
	  
      <p> 
      <label>Meta Deskripsi</label>
	  <span class='field'>
      <input type=text name='meta_deskripsi' value='$r[meta_deskripsi]' class='input-xxlarge' /></span>
      </p> 
	  
      <p> 
      <label>Meta Keyword</label>
	  <span class='field'>
      <input type=text name='meta_keyword'  value='$r[meta_keyword]' class='input-xxlarge' /></span>
      </p>
	
      <p> 
      <label>Email</label>
	  <span class='field'>
      <input type=text name='email' value='$r[email]' class='input-xxlarge' /></span>
      </p>
	
      <p> 
      <label>Kepela Sekolah</label>
	  <span class='field'>
      <input type=text name='kepala_sekolah' value='$r[kepala_sekolah]' class='input-xxlarge' /></span>
      </p>
	
      <p> 
      <label>NIP</label>
	  <span class='field'>
      <input type=text name='nip' value='$r[nip]' class='input-xxlarge' /></span>
      </p>
 		  
      <p> 
      <label>No. Telp/HP</label>
	  <span class='field'>
      <input type=text name='tlp' value='$r[tlp]' class='input-xxlarge' /></span>
      </p>
 		  
      <p> 
      <label>Facebook</label>
	  <span class='field'>
      <input type=text name='facebook' value='$r[facebook]' class='input-xxlarge' /></span>
      </p>
 		  
      <p> 
      <label>Twitter</label>
	  <span class='field'>
      <input type=text name='twitter' value='$r[twitter]' class='input-xxlarge' /></span>
      </p>
 		  
      <p> 
      <label>User Twitter</label>
	  <span class='field'>
      <input type=text name='user_twitter' value='$r[user_twitter]' class='input-xxlarge' /></span>
      </p>
	  
      <p> 
      <label>Peta</label>
	  <span class='field'>
	  <textarea  name='peta' cols='250' rows='5' class='span5'>$r[peta]</textarea>
      </p> 	 
	 
	  
	  <p> 
      <label>Alamat</label>
	  <span class='field'>
      <input type=text name='alamat' value='$r[alamat]' class='input-xxlarge' />
	  </span>
      </p> 
	
	
      <p> 
      <label>Gambar Favicon</label>";
      if ($r[favicon]!=''){
echo "<img src=../img_anekaweb/logo/$r[favicon] width=30>
      </p>"; 
	  }
	  
echo "<p> 
      <label>Upload Gambar</label>
	  <span class='field'>
      <input type='file' name='fupload' />
	  <span class style=\"color:#EA1C1C;\">ukuran favicon 50x50px
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


