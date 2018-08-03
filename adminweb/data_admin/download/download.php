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
	
	  $aksi="data_admin/download/aksi_download.php";
	  switch($_GET[act]){
	  // Tampil download
	  default:
echo "<div class='pagetitle'><h1>Download Katalog</h1> </div>";

///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan Download.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Download.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus Download.
      </div>";}
      

echo "<form action='$aksi?module=download&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=download&act=tambahdownload' button class='btn'>Tambah Download</button></a>
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
      <th class='head0'>No.</th> 
      <th class='head1'>Judul</th> 
      <th class='head0'>File</th> 
	  <th class='head1'>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM download ORDER BY id_download DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM download 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_download DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
	  
echo "<tr class=gradeX> 
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_download]'></span></td>
      <td>$no</td> 
      <td>$r[judul]</td> 
      <td>$r[nama_file]</td>  
      <td>
	  <a href=?module=download&act=editdownload&id=$r[id_download] title='Edit'><span class='icon-edit'></span></a> 
	  <a href='$aksi?module=download&act=hapus&id=$r[id_download]&namafile=$r[nama_file]' title='Hapus' class='with-tip' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a>
	  </td></tr>";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break; 
  
///// TAMBAH DOWNLOAD ////////////////////////////////////////////////////////////////////////////////////////
 
case "tambahdownload":
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah Download</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	   
	  <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data' class='stdform'>
	  
	  <p>
	  <label>Judul</label>
      <span class='field'>
	  <input type='text' name='judul' class='input-xxlarge' />
	  </span>
	  </p>
	  
	  <p> 
	  <label>Upload</label>
      <span class='field'>
	  <input type='file' name='fupload' /> 
	  </span>
	  </p>";

echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=download'>Batal</a>
      </p> 
	  </form>
	  </div>
	  </div>";
	  
	  break;
 
///// EDIT DOWNLOAD ////////////////////////////////////////////////////////////////////////////////////////
    
      case "editdownload":
      $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
      $r    = mysql_fetch_array($edit);

echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Download</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=download&act=update' enctype='multipart/form-data' class='stdform'>
      <input type=hidden name=id value=$r[id_download]>
	  
	  <p> 
      <label>Judul</label>
	  <span class='field'>
      <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
      </p>";
 
echo "<p> 
	  <label>Gambar</label>
      $r[nama_file] 
      </p>
	  
      <p> 
	  <label>Upload</label>
      <span class='field'>
	  <input type='file' name='fupload' /> 
	  </span>
	  </p>";
	  
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=download'>Batal</a>
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
