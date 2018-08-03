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
    
      $aksi="data_admin/agenda/aksi_agenda.php";
      switch($_GET[act]){
    
///// TAMPIL KONTEN /////////////////////////////////////////////////////////////////
      
      default:
echo "<div class='pagetitle'><h1>UKM</h1> </div>";
      
      
///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan UKM.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update UKM.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus UKM.
      </div>";}
      
      
echo "<form action='$aksi?module=agenda&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=agenda&act=tambahagenda' button class='btn'>Tambah UKM</button></a>
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
      <th class='head1'>Gambar</th>
      <th class='head1'>Nama UKM</th>
      <th class='head1'><center>Aksi<center></th>
      </tr>
      </thead>";
       
      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM ukm ORDER BY id_ukm DESC");
	  }
	  else{
      $tampil=mysql_query("SELECT * FROM ukm 
                                    WHERE username='$_SESSION[namauser]'       
                                    ORDER BY id_ukm DESC");
	  } 
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
	  
       
echo "<tr class=gradeX>
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_ukm]'></span></td>
	  <td>$no</td> 
	  <td><img src='../img_anekaweb/ukm/small_$r[gambar]' width=70></a></td> 
      <td>$r[tema]</td>
      <td>
      <a href=?module=agenda&act=editagenda&id=$r[id_ukm]><span class='icon-edit'></span></a> 
	  <a href='$aksi?module=agenda&act=hapus&id=$r[id_ukm]&namafile=$r[gambar]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <span class='icon-trash'></span></a> 
      </td> 
      </tr>"; 
      $no++;
	  } 
echo "</table>
      </form>
	  </div>"; 
	  
      break;

///// TAMBAH agenda ////////////////////////////////////////////////////////////////////////////////////////

	  case "tambahagenda":
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah UKM</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=agenda&act=input' enctype='multipart/form-data' class='stdform'>
	
	  <p>
	  <label>Nama UKM</label>
      <span class='field'>
	  <input type='text' name='tema' class='input-xxlarge' />
	  </span>
	  </p>
	
	  <p> 
	  <label>Deskripsi</label>
	  <span class='field'>
	  <textarea id='anekaweb' name='isi_ukm' cols='80' rows='10' class='span5'></textarea>
	  </span>
	  </p>";
	  
echo "<p>
	  <label>Pengirim</label>
      <span class='field'>
	  <input type='text' name='pengirim' class='input-xxlarge' />
	  </span>
	  </p>
		 
	   <p> 
	   <label>Upload Gambar</label>
	   <span class='field'>
	   <input type=file name='fupload' size=40>
	   </span>
	   </p> 	  
			  
      </p>
      <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=agenda'>Batal</a>
      </p>
	
	  </form>
	  </div>
	  </div>"; 
	  
	  break;
	  
///// EDIT agenda///////////////////////////////////////////////////////////////////////////////////////////////////////

	  case "editagenda":
	  $edit = mysql_query("SELECT * FROM ukm WHERE id_ukm='$_GET[id]'");
  	  $r    = mysql_fetch_array($edit);


echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit UKM</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>

	  <form method=POST enctype='multipart/form-data' action=$aksi?module=agenda&act=update class='stdform'>
	  <input type=hidden name=id value=$r[id_ukm]>
		  
      <p> 
      <label>Nama UKM</label>
	  <span class='field'>
      <input type=text name='tema' class='input-xxlarge' value='$r[tema]'>
	  </span>
      </p> 	
	  
      <p> 
      <label>Deskripsi</label>
	  <span class='field'>
	  <textarea  id='anekaweb' name='isi_ukm' cols='80' rows='10' class='span5'>$r[isi_ukm]</textarea>
      </p>";

echo "<p> 
      <label>Pengirim</label>
	  <span class='field'>
      <input type=text name='pengirim' class='input-xxlarge' value='$r[pengirim]'>
	  </span>
      </p>

      <p> 
      <label>Gambar</label> ";
      if ($r[gambar]!=''){
echo "<img src='../img_anekaweb/ukm/small_$r[gambar]' width=100>
      </p>";
	  } 	  

echo "<p> 
      <label>Upload Gambar</label>
	  <span class='field'>
      <input type=file name='fupload'>
	  </span>
      </p>";
 
 
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=agenda'>Batal</a>
      </p>
 
      </form>
      </div>
      </div>";
   
   
       break;}} 
		
	  else {
	  echo akses_salah();
	  }
	  }
	  ?>