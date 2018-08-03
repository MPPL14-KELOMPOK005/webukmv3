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
	
	
	  $aksi="data_admin/logo/aksi_logo.php";
	  switch($_GET[act]){
	  
	  
	  default:
echo "<div class='pagetitle'><h1>Logo Website</h1> </div>";
		  
///// PESAN UPDATE //////////////////////////////////////////////////////////////////////////

	  if(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> meg-update Logo Website.
	  </div>";}
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <table class='table table-bordered mailinbox'>
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
	  <th class='head0'>Logo</th>
	  <th class='head0'>Judul</th>
	  <th class='head0'>Link</th>
	  <th class='head1'>Edit</th>
	  </thead>
	  <tbody>";
	   
	  $tampil=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC");
	  $no=1;
	  while ($r=mysql_fetch_array($tampil)){
	  $tgl=tgl_indo($r[tgl_posting]);
		  
echo "<tr class=gradeX> 
      <td>$no</td> 
	  <td><img src='../img_anekaweb/logo/$r[gambar]'  width='100'></td>
	  <td>$r[judul]</td>
	  <td>$r[url]</td>
	  <td>
	  <a href=?module=logo&act=editlogo&id=$r[id_logo] ><span class='icon-edit'></span></a>
	  </td>
	  </tr>";
	  $no++;
	  }
echo "</table>
      </form>";
	  
	  break;
  

///// EDIT LOGO ///////////////////////////////////////////////////////////////////////////////
	
	  case "editlogo":
	  $edit = mysql_query("SELECT * FROM logo WHERE id_logo='$_GET[id]'");
	  $r    = mysql_fetch_array($edit);
		
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Logo</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
		
	  <form method=POST enctype='multipart/form-data' action=$aksi?module=logo&act=update class='stdform'>
	  <input type=hidden name=id value=$r[id_logo]>
	  
	  <p> 
      <label>Judul</label>
	  <span class='field'>
      <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
      </p> 
	  
	  <p> 
      <label>Link</label>
	  <span class='field'>
      <input type=text name='url' class='input-xxlarge' value='$r[url]'>
	  </span>
      </p> 
	  
	  <p> 
	  <label>Logo</label>
      <span class='field'>
	  <img src='../img_anekaweb/logo/$r[gambar]' width='100'>
	  </span>
	  </p>         
	   
	  <p> 
	  <label>Ganti Logo</label>
      <span class='field'>
	  <input type=file name='fupload'> 
	  </span>  
	  </p>
	   
	
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=logo'>Batal</a>
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