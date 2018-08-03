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
	
	  $aksi="data_admin/header/aksi_header.php";
	  switch($_GET[act]){
	  // Tampil header
	  default:
echo "<div class='pagetitle'><h1>Header</h1> </div>";

///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan Header.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Header.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus Header.
      </div>";}
	  
echo "<form action='$aksi?module=header&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=header&act=tambahheader' button class='btn'>Tambah Header</button></a>
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
      <th class='head0'>Gambar</th> 
      <th class='head1'>Tgl. Posting</th> 
	  <th class='head0'>Aksi</th>
      </tr> 
      </thead>";


    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM header ORDER BY id_header DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM header 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_header DESC");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	 $tgl=tgl_indo($r[tgl_posting]);
echo "<tr class=gradeX> 
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_header]'></span></td>
      <td>$no</td> 
      <td>$r[judul]</td> 
      <td><img src='../img_anekaweb/header/$r[gambar]' width='100'></td>  
	  <td>$tgl</td> 
      <td>
	  <a href=?module=header&act=editheader&id=$r[id_header] title='Edit'><span class='icon-edit'></span></a> 
	  <a href='$aksi?module=header&act=hapus&id=$r[id_header]&namafile=$r[gambar]' title='Hapus' class='with-tip' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a></td> 
      </tr>";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break;   
  
///// TAMBAH HEADER ////////////////////////////////////////////////////////////////////////////////////////
  
      case "tambahheader":
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah Header</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=header&act=input' enctype='multipart/form-data' class='stdform'>
	  
	  <p>
	  <label>Judul Header</label>
      <span class='field'>
	  <input type='text' name='judul' class='input-xxlarge' />
	  </span>
	  </p>
	  
	  <p> 
	  <label>Upload</Label>
      <span class='field'>
	  <input type='file' name='fupload' size='30' /> *)Ukuran gambar 980x560px 
	  </span>
	  </p>";

echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=header'>Batal</a>
      </p>
	
	  </form>
	  </div>
	  </div>";
	
	 
	 break;
 
///// EDIT HEADER///////////////////////////////////////////////////////////////////////////////////////////////////////
   
      case "editheader":
      $edit = mysql_query("SELECT * FROM header WHERE id_header='$_GET[id]'");
      $r    = mysql_fetch_array($edit);

echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Header</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=header&act=update' enctype='multipart/form-data' class='stdform'>
      <input type=hidden name=id value=$r[id_header]>
	  
	  <p> 
      <label>Judul Header</label>
	  <span class='field'>
      <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
      </p>";

echo "<p> 
	  <label>Gambar</label>
	  <span class='field'>
      <img src='../img_anekaweb/header/$r[gambar]' width='100'> 
      </span>
      </p>
	  
      <p> 
	  <label>Gambar</label>
	  <span class='field'>
	  <input type='file' name='fupload' size='30' /> *)Ukuran gambar 980x560px
	  </span></p>";

echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=header'>Batal</a>
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
