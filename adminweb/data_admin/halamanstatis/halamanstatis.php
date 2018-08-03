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
	  
///// cek hak akses user ///////////////////////////////////////////////////////////////////

      $cek=user_akses($_GET[module],$_SESSION[sessid]);
      if($cek==1 OR $_SESSION[leveluser]=='admin'){


      $aksi="data_admin/halamanstatis/aksi_halamanstatis.php";
      switch($_GET[act]){

  
///// Tampil HALAMAN STATIS//////////////////////////////////////////////////////////////////
  
      default:
echo "<div class='pagetitle'><h1>Halaman Baru</h1> </div>";
  
///// PESAN INPUT //////////////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan Halaman.
      </div>";}
	
	
///// PESAN UPDATE /////////////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Halaman.
      </div>";
	  }
  
///// PESAN HAPUS /////////////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus Halaman.
      </div>";
	  }

echo "<form action='$aksi?module=halamanstatis&act=hapussemua' method='post'> 
	   
	  <div class='maincontent'>
	  <div class='contentinner'>
	  
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=halamanstatis&act=tambahhalamanstatis' button class='btn'>Tambah Halaman Baru</button></a>
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
	  <th class='head1'>Judul</th> 
	  <th class='head0'>Link</th>
	  <th class='head1'>Tanggal Posting</th>  
	  <th class='head0'>Edit</th>
	  </tr>
	  </thead>"; 
	 
      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM halamanstatis 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_halaman DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
	  $tgl_posting=tgl_indo($r[tgl_posting]);
	
echo "<tr class=gradeX>  
	  <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_halaman]'></span></td>
	  <td>$no</td> 
	  <td>$r[judul]</td> 
	  <td>hal/$r[judul_seo]</td>
	  <td>$tgl_posting</td> 
	  <td>
	  <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]><span class='icon-edit'></span></a> 
	  <a href='$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a> 
	  </td>
	  </tr>";
   
      $no++;}
 
echo "</table>
      </form>
	  </div>";
	  
       break; 

///// TAMBAH HALAMAN ///////////////////////////////////////////////////////////////////////////
  
      case "tambahhalamanstatis":
  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah Halaman Baru</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
		
	  <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data' class='stdform'>
			  
	  <p> 
	  <label>Judul</label>
      <span class='field'>
	  <input type=text name='judul' class='input-xxlarge'>
	  </span>
	  </p> 
			  
	  <p> 
	  <label>Isi Halaman</label>
	  <span class='field'>
	  <textarea id='anekaweb' name='isi_halaman' cols='80' rows='10' class='span5'></textarea>
	  </span>
	  </p> 
	
	  <p> 
	  <label>Gambar</label>
	  <span class='field'>
	  <input type='file' name='fupload'/>
	  </span>
	  </p>
		  
		 
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
      </p>
	
		  
	  </form>
	  </div>
	  </div>";
		  
		  
	  break;
		
	  case "edithalamanstatis":
	  $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]' AND username='$_SESSION[namauser]'");
	  $r    = mysql_fetch_array($edit);
	   
	   
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Halaman</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	
	  <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update class='stdform'>
	  <input type=hidden name=id value=$r[id_halaman]>
			 
			  
	  <p> 
	  <label>Judul</label>
	  <span class='field'>
	  <input type=text name='judul' class='input-xxlarge' value='$r[judul]'>
	  </span>
	  </p> 
			  
	  <p> 
	  <label>Isi Halaman</label>
	  <span class='field'>
	  <textarea id='anekaweb' name='isi_halaman' cols='80' rows='10' class='span5'>$r[isi_halaman]</textarea></td>
	  </span>
	  </p> 
		
	  <p> 
	  <label>Gambar</label>
	  <span class='field'>";
	  if ($r[gambar]!=''){
echo "<img src='../img_anekaweb/statis/$r[gambar]' width=200>
      </span>
	  </p>";
	  }
	
echo "<p> 
	  <label>Upload Gambar</label>
	  <span class='field'>
	  <input type='file' name='fupload' />
	  </span>
	  </p>";
		  
	
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
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


