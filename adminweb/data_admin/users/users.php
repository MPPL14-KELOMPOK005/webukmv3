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
	
	
	  $aksi="data_admin/users/aksi_users.php";
	  switch($_GET[act]){
  
	  default:
echo "<div class='pagetitle'><h1>Manajemen User Admin</h1> </div>";
	  
	  
///// PESAN INPUT ////////////////////////////////////////////////////////////////////

 	  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menambahkan User Admin.
	  </div>";
	  }
		
///// PESAN UPDATE ///////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> meg-update User Admin.
	  </div>";}
	  
///// PESAN HAPUS /////////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menghapus User Admin.
	  </div>";
	  }

echo "<div class='maincontent'>
	  <div class='contentinner'>
	  
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=user&act=tambahuser' button class='btn'>Tambah User Admin</button></a>
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
	  <th class='head0 nosort'>No</th> 
	  <th class='head0'>Username</th> 
	  <th class='head1'>Nama Lengkap</th> 
	  <th class='head0'>Email</th>
	  <th class='head1'>Foto</th>
	  <th class='head0'>Blokir</th> 
	  <th class='head1'>Action</th>
	  </tr>
	  </thead>";
	  
	  if ($_SESSION[leveluser]=='admin'){
	  $tampil = mysql_query("SELECT * FROM users ORDER BY id_session DESC");}
		
	  else{
	  $tampil=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");}
	  
	  $no = $posisi+1;
	  while($r=mysql_fetch_array($tampil)){
		
echo "<tr class=gradeX> 
	  <td class='aligncenter'>$no</td>
	  <td>$r[username]</td>
	  <td>$r[nama_lengkap]</td>
	  <td><a href=mailto:$r[email]>$r[email]</a></td>
	  <td><img src='../img_anekaweb/user/small_$r[foto]' width=30></center></td>
	  <td>$r[blokir]</td>
	  <td>
	  <a href=?module=user&act=edituser&id=$r[id_session]><span class='icon-edit'></span></a>
	  </td>
	  </tr>";
	  $no++;
	  }
echo "</table>
      </form>
	  </div>";
	
	  break;

///// TAMBAH USER ///////////////////////////////////////////////////////////////////////
	
	  case "tambahuser":
	  if ($_SESSION[leveluser]=='admin'){
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambahkan User Admin</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	   
	  <form method=POST action='$aksi?module=user&act=input' enctype='multipart/form-data' class='stdform' >
		  
	  <p> 
	  <label>Username</label>
      <span class='field'>
	  <input type=text name='username' class='input-xxlarge'>
	  </span>
	  </p> 
			  
	  <p> 
	  <label>Password</label>
      <span class='field'>
	  <input type=text name='password' class='input-xxlarge'>
	  </span>
	  </p> 
	
	  <p> 
	  <label>Nama Lengkap</label>
      <span class='field'>
	  <input type=text name='nama_lengkap' class='input-xxlarge'>
	  </span>
	  </p> 
			  
	  <p> 
	  <label>E-mail</label>
      <span class='field'>
	  <input type=text name='email' class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label>No.Telp/HP</label>
      <span class='field'>
	  <input type=text name='no_telp' class='input-xxlarge'>
	  </span>
	  </p> 
	  
	   <p> 
	  <label>Profil</label>
	  <span class='field'>
	  <textarea id='anekaweb' name='profil' cols='80' rows='10' class='span5'></textarea>
	  </span>
	  </p>
	  
	  <p> 
	  <label>Upload Foto</label>
      <span class='field'>
	  <input type='file' name='fupload' />
	  </span>
	  </p>";
		  
	
echo "<p>
      <label>Pilih Hak Akses Modul</label>
      <span class='formwrapper'>";
	  $qrMod = mysql_query("SELECT * FROM modul WHERE publish='Y' AND status='user'");
	  while($mod=mysql_fetch_array($qrMod)){
echo "<input name='modul[]' type='checkbox' value='$mod[id_modul]'/>$mod[nama_modul]";
       }
echo "</span>
	   </p>";
	
	
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=user'>Batal</a>
      </p>
	  
	  </form>
	  </div>
	  </div>";
	  }
		  
	  else{
echo "<div class='maincontent'>
	  <div class='contentinner '>
	  <h4 class='widgettitle nomargin'>ANDA TIDAK BERHAK MENGAKSES HALAMAN INI.</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  </div>
	  </div>";
	  }
		 
	  break;
	  
///// EDIT USER /////////////////////////////////////////////////////////////////////////

	  case "edituser":
	  $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
      $r=mysql_fetch_array($edit);
      if($_SESSION[leveluser]=='admin'){
		
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit User Admin</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
		 
	  <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value='$r[id_session]'>
	  <input type=hidden name=blokir value='$r[blokir]'>
		 
	  <p> 
	  <label>Username</label>
	  <span class='field'>
	  <input type=text name='username' value='$r[username]' disabled class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label>Password</label>
	  <span class='field'>
	  <input type=text name='password' class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label>Nama Lengkap</label>
	  <span class='field'>
	  <input type=text name='nama_lengkap' class='input-xxlarge' value='$r[nama_lengkap]'>
	  </span>
	  </p> 
		 
	  <p> 
	  <label>E-mail</label>
	  <span class='field'>
	  <input type=text name='email' class='input-xxlarge' value='$r[email]'>
	  </span>
	  </p> 
		 
	  <p> 
	  <label>No.Telp/HP</label>
	   <span class='field'>
	  <input type=text name='no_telp' size=30 value='$r[no_telp]' class='input-xxlarge'>
	  </span>
	  </p> 
	   
	   <p> 
      <label>Profil</label>
	  <span class='field'>
	  <textarea  id='anekaweb' name='profil' cols='80' rows='10' class='span5'>$r[profil]</textarea>
      </p>
	   
	  <p> 
	  <label>Foto</label>
	   <span class='field'>
	  <img src='../img_anekaweb/user/small_$r[foto]' width=100>
	  </span>
	  </p>   
		
	  <p> 
	  <label>Ganti Foto</label>
	   <span class='field'>
	  <input type='file' name='fupload' />
	  </span>
	  </p>";
			  
      if ($r[blokir]=='N'){
echo "<p> 
	  <label>Blokir</label>
      <span class='formwrapper'>
	  <input type=radio name='blokir' value='Y'>Ya
	  <input type=radio name='blokir' value='N' checked>Tidak
	  </span>
	  </p>";
	  }
	  else{
echo "<p> 
	  <label>Blokir</label>
      <span class='formwrapper'>
	  <input type=radio name='blokir' value='Y' checked>Ya
	  <input type=radio name='blokir' value='N'>Tidak
	  </span>
	  </p>";
	  }
	  
	  $qrMod1 = mysql_query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul 
	  AND users_modul.id_session='$_GET[id]'");

echo "<p> 
	  <label>Hak Akses</label>
	  <span class='field'>";
	  while($mod1=mysql_fetch_array($qrMod1)){
		
echo "(<b>$mod1[nama_modul]</b> -
      <a href='$aksi?module=user&act=hapusmodule&id=$mod1[id_umod]&sessid=$_GET[id]' 
	  onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a> )";
	  }
echo "</span>
      </p>";
	  
	  $qrMod = mysql_query("SELECT * FROM modul WHERE publish='Y' AND status='user'");
echo "<p> 
	  <label>Tambah Modul</label>
      <span class='formwrapper'>";
	  while($mod=mysql_fetch_array($qrMod)){
echo "<input name='modul[]' type='checkbox' value='$mod[id_modul]' />$mod[nama_modul]";}
echo "</span>
	  </p>";
		
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=user'>Batal</a>
      </p>
	
	  </form>
	  </div>
	  </div>";
	  }
	  else {
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit User Administrator</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
		 
	  <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value=$r[id_session]>
	  <input type=hidden name=blokir value='$r[blokir]'>
		 
	  <p> 
	  <label>Username</label>
	  <span class='field'>
	  <input type=text name='username' value='$r[username]' disabled class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label>Password</label>
	  <span class='field'>
	  <input type=text name='password' class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label>Nama Lengkap</label>
	  <span class='field'>
	  <input type=text name='nama_lengkap' class='input-xxlarge' value='$r[nama_lengkap]'>
	  </span>
	  </p> 
		 
	  <p> 
	  <label>E-mail</label>
	  <span class='field'>
	  <input type=text name='email' class='input-xxlarge' value='$r[email]'>
	  </span>
	  </p> 
		 
	  <p> 
	  <label>No.Telp/HP</label>
	  <span class='field'>
	  <input type=text name='no_telp' size=30 value='$r[no_telp]' class='input-xxlarge'>
	  </span>
	  </p> 
	
	  <p> 
	  <label>Foto</label>
	  <span class='field'>
	  <img src='../foto_user/small_$r[foto]' width=100>
	  </span>
	  </p>   
		
	  <p> 
	  <label>Ganti Foto</label>
	  <span class='field'>
	  <input type='file' name='fupload' />
	  </span>
	  </p>";
			  
	   
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=user'>Batal</a>
      </p>
	
	  </form>
	  </div>
	  </div>";}
		
	  break;
	  }
	  } 
	  else {
echo akses_salah();
	  }
	  }
	  ?>
	
	
