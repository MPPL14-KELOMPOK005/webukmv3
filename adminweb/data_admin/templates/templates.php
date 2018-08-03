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
	
	
	  $aksi="data_admin/templates/aksi_templates.php";
	  switch($_GET[act]){
	  
	  default:
echo "<div class='pagetitle'><h1>Template Website</h1> </div>";
	  
///// PESAN INPUT ////////////////////////////////////////////////////////////////////

	  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menambahkan Template Website.
	  </div>";
	  }
	  
///// PESAN UPDATE ////////////////////////////////////////////////////////////////////
	  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> meg-update Template Website.
	  </div>";}
	  
///// PESAN HAPUS ////////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> menghapus Template Website.
	  </div>";}
	
	  
///// PESAN AKTIF ////////////////////////////////////////////////////////////////////

	  elseif(isset($_GET['msg']) && $_GET['msg']=='aktif'){
echo "<div class='alert alert-info'>
	  <button data-dismiss='alert' class='close' type='button'>x</button>
	  <strong>Anda berhasil</strong> meng-aktifkan Template Website.
	  </div>";}

echo "<div class='maincontent'>
	  <div class='contentinner'>
	  
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=templates&act=tambahtemplates' button class='btn'>Tambah Template</button></a>
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
	  <th class='head0 nosort'>No</th>
	  <th class='head0'>Nama Template</th>
	  <th class='head1'>Pembuat</th>
	  <th class='head0'>Folder</th>
	  <th class='head1'>Aktif</th>
	  <th class='head0'>Edit</th>
	  <th class='head1'>Aktif</th>
	  </tr>
	  </thead>";
	
	  if ($_SESSION[leveluser]=='admin'){
	  $tampil = mysql_query("SELECT * FROM templates ORDER BY id_templates DESC");}
	   
	  else{
	  $tampil=mysql_query("SELECT * FROM templates WHERE username='$_SESSION[namauser]'       
	  ORDER BY id_templates DESC");}
	  
	  $no = $posisi+1;
	  while ($r=mysql_fetch_array($tampil)){
		
echo "<tr class=gradeX>
	  <td class='aligncenter'>$no</td>	  
	  <td>$r[judul]</td>
	  <td>$r[pembuat]</td>
	  <td>$r[folder]</td>
	  <td>$r[aktif]</td>
	  <td>
	  <a href=?module=templates&act=edittemplates&id=$r[id_templates] ><span class='icon-edit'></span></a>
	  </td>
	   
	  <td>
	  <a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates] ><span class='icon-ok'></span></a> 
	  </td>
	  </tr>";
	  $no++;
	  }
echo "</table>
      </form>
	  </div>";
	  
	  break;
	  
///// TAMBAH TEMPLATE ///////////////////////////////////////////////////////////////////////////////////

	  case "tambahtemplates":
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah Template Website</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  <form method=POST action='$aksi?module=templates&act=input' class='stdform'>
	
	  <p> 
	  <label>Nama Templates</label>
      <span class='field'>
	  <input type=text name='judul' class='input-xxlarge'>
	  </span>
	  </p> 	
	   
	  <p> 
	  <label>Pembuat</label>
      <span class='field'>
	  <input type=text name='pembuat' class='input-xxlarge'>
	  </span>
	  </p> 
	   
	  <p> 
	  <label for=field4>Folder</label>
      <span class='field'>
	  <input type=text name='folder' value='layout/' class='input-xxlarge'>
	  </span>
	  </p> 
	
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=templates'>Batal</a>
      </p>
	  
	  </form>
	  </div>
	  </div>";
	   
	  break;
  
///// EDIT TEMPLATE WEBSITE //////////////////////////////////////////////////////////////////////////////////

	  case "edittemplates":
	  $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
	  $r=mysql_fetch_array($edit);
	
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Template Website</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
		
	  <form method=POST action=$aksi?module=templates&act=update class='stdform'>
	  <input type=hidden name=id value='$r[id_templates]'>
			  
	  <p> 
	  <label>Nama Template</label>
      <span class='field'>
	  <input type=text name='judul' value='$r[judul]' class='input-xxlarge'>
	  </span>
	  </p> 	
		  
	  <p> 
	  <label>Pembuat</label>
      <span class='field'>
	  <input type=text name='pembuat' value='$r[pembuat]' class='input-xxlarge'>
	  </span>
	  </p> 	
		  
	  <p> 
	  <label>Folder</label>
      <span class='field'>
	  <input type=text name='folder' value='$r[folder]' class='input-xxlarge'>
	  </span>
	  </p> 
			  
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=templates'>Batal</a>
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
	
	
