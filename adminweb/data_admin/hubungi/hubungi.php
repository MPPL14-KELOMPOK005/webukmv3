      <?php
      session_start();
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
      if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	  } 
      else{
	  
///// cek hak akses user ////////////////////////////////////////////////////////////////////

	  $cek=user_akses($_GET[module],$_SESSION[sessid]);
	  if($cek==1 OR $_SESSION[leveluser]=='admin'){
	
	
	  $base_url = $_SERVER['HTTP_HOST'];
	  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
	
	
	  $aksi="data_admin/hubungi/aksi_hubungi.php";
	  switch($_GET[act]){
	  
	  default:
echo "<div class='pagetitle'><h1>Pesan Masuk</h1> </div>";
	  
///// PESAN INPUT //////////////////////////////////////////////////////////////////////////////

	  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menambahkan Pesan Masuk.
	  </div>";
	  }
		
///// PESAN UPDATE /////////////////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> meg-update Pesan Masuk.
	  </div>";}
	  
///// PESAN HAPUS //////////////////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menghapus Pesan Masuk.
	  </div>";
	  }


echo "<form action='$aksi?module=hubungi&act=hapussemua' method='post'>
	  <div class='maincontent'>
	  <div class='contentinner'>
	  
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <input type='submit' class='btn btn-primary' value='Hapus yang terseleksi' style='height: 30px;' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
      </li>
      </ul>
      <span class='clearall'></span>
      </div><br/>
	  
	  <table class='table table-bordered mailinbox' id='dyntable'>
	  <colgroup>
	  <col class='con0' style='align: center; width: 4%' />
	  <col class='con1' />
	  <col class='con0' />
	  <col class='con1' />
	  <col class='con0' />
	  <col class='con1' />
	  </colgroup>";
       
echo "<thead>
	  <tr>
	  <th class='head0 nosort'><input type='checkbox' name='checkall' class='checkall' /></th>
	  <th class='head0'>No</th>
	  <th class='head0'>Nama</th>
	  <th class='head0'>Email</th>
	  <th class='head0'>Subjek</th>
	  <th class='head0'>Tanggal</th>
	  <th class='head1'>Action</th>
	  </tr>
	  </thead>";
	  $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC");
	
	  $no = $posisi+1;
	  while ($r=mysql_fetch_array($tampil)){
	  $tgl=tgl_indo($r[tanggal]);
	  
	  if($r[dibaca]=='N'){
echo "<tr class=gradeX> 
	  <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_hubungi]'></span></td>
	  <td><b><blink>$no</blink></b></td>
	  <td><b><blink>$r[nama]</blink></b></td>
	  <td><b><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]><blink>$r[email]</blink></a></b></td>
	  <td><b><blink>$r[subjek]</blink></b></td>
	  <td><b><blink>$tgl</blink></b></td>
	  
	  <td>
	  <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]><span class='icon-edit'></span></a>
	  <a href='$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a> 
	  </td>
	  </tr>";
	  } 
	  else {
echo "<tr class=gradeX> 
	  <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_hubungi]'></span></td>
	  <td>$no</td>
	  <td>$r[nama]</td>
	  <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
	  <td>$r[subjek]</td>
	  <td>$tgl</td>
	  <td>
	  <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]><span class='icon-edit'></span></a>
	  <a href='$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a> 
	  </td>
	  </tr>";
	  }
	  $no++;}
echo "</table>
      </form>
	  </div>";
		
	  break;
	  
///// Balas Email //////////////////////////////////////////////////////////////////////////////

	  case "balasemail":
	  $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
	  $r      = mysql_fetch_array($tampil);
	  mysql_query("UPDATE hubungi SET dibaca='Y' WHERE id_hubungi='$_GET[id]'");
	
	
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Pesan Masuk</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	   
	  <form method=POST action='?module=hubungi&act=kirimemail' class='stdform'>
			  
	  <p> 
	  <label>Kepada</label>
      <span class='field'>
	  <input type=text name='email' class='input-xxlarge' value='$r[email]'>
	  </span>
	  </p> 
			 
	  <p> 
	  <label>Subjek</label>
      <span class='field'>
	  <input type=text name='subjek' class='input-xlarge' value='Re: $r[subjek]'>
	  </span>
	  </p> 
	   
	   
	  <p> 
	  <label>Pesan</label>
      <span class='field'>
	  <textarea id='anekaweb' name='pesan' cols='80' rows='10' class='span5'></span>  
	  <hr></hr>
	  $r[pesan]</textarea>
	  </p> 
		 
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=hubungi'>Batal</a>
      </p>
	   
	  </form>
	  </div>
	  </div>";
				  
	  break;

///// Kirim Email //////////////////////////////////////////////////////////////////////////////
		 
	  case "kirimemail":
	  $dari = "From: $iden[nama_website] <".$iden[email].">\n" . 
	  "MIME-Version: 1.0\n" . 
	  "Content-type: text/html; charset=iso-8859-1";
	
	  mail($_POST[email],$_POST[subjek],$_POST[pesan],$dari);
		
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Status Email</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	   <div class='row-form'>
      <h5>Email telah sukses terkirim ke tujuan.</h5>
      </div>
	  
	  <p class='stdformbutton'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=hubungi'>Kembali</a>
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
	
