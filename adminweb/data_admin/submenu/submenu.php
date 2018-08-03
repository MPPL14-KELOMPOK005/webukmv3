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
	
	  $aksi="data_admin/submenu/aksi_submenu.php";
	  switch($_GET[act]){
	  // Tampil Menu Utama
	  default:
echo "<div class='pagetitle'><h1>Sub Menu</h1> </div>";

///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan Sub Menu.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Menu Sub Menu.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus Sub Menu.
      </div>";}

echo "<form action='$aksi?module=submenu&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <a href='?module=submenu&act=tambahsubmenu' button class='btn'>Tambah Sub Menu</button></a>
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
	  <th>No</th>
      <th>Sub Menu</th>
      <th>Menu Utama</th>
      <th>Link Submenu</th>
      <th>Aksi</th>
	  </thead>";
	  
      
	if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main ORDER BY id_sub DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM submenu,mainmenu
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_submenu DESC");
    }
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){ 
echo "<tr class=gradeX> 
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_sub]'></span></td>
      <td><center>$no</center></td>
      <td>$r[nama_sub]</td>
      <td>$r[nama_menu]</td>
      <td>$r[link_sub]</td> 
      <td>
	  <a href=?module=submenu&act=editsubmenu&id=$r[id_sub] title='Edit''>
	  <span class='icon-edit'></span></a> 
	 <a href='$aksi?module=submenu&act=hapus&id=$r[id_sub]' title='Hapus' class='with-tip' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\"><span class='icon-trash'></span></a></td></tr>";
	  $no++;
      }
 echo "</table>
      </form>
	  </div>";   
	  
      break;

///// TAMBAH Sub Menu ////////////////////////////////////////////////////////////////////////////////////////
 
      case "tambahsubmenu":
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Tambah Sub Menu</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	   
	  <form method=POST action='$aksi?module=submenu&act=input' enctype='multipart/form-data' class='stdform'>
	  
	  <p> 
      <label>Nama Sub menu</label>
      <span class='field'>
	  <input type='text' name='nama_sub' class='input-xxlarge' />
	  </span>
      </p> 
	  
	  <p> 
      <label>Menu Utama</label>
      <select name='menu_utama' style='width:350px' class='chzn-select' tabindex='2'>
      <option value=0 selected>- Pilih Menu Utama -</option>";
      $tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
      while($r=mysql_fetch_array($tampil)){
echo "<option value=$r[id_main]>$r[nama_menu]</option>
      </p>";}
	  
echo "</select>
      <p> 
      <label>Link</label>
      <span class='field'>
	  <input type='text' name='link_sub' class='input-xxlarge' />
	  </span>
      </p>	 
	  
	  <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=submenu'>Batal</a>
      </p> 
	  </form>
	  </div>
	  </div>";
	 
      break;
  
///// EDIT SUB MENU //////////////////////////////////////////////////////////////////////////////////////// 
 
      case "editsubmenu":
      $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
      $r    = mysql_fetch_array($edit);
		  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>Edit Sub Menu</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=submenu&act=update' enctype='multipart/form-data' class='stdform'>
      <input type=hidden name=id value='$r[id_sub]'>	  
		  
	  <p> 
      <label>Nama Sub Menu</label>
      <span class='field'>
	  <input type=text name='nama_sub' value='$r[nama_sub]' class='input-xxlarge' />
	  </span>
      </p> 
	  
	  <p> 
   	  <label>Menu Utama</label>
      <select name='menu_utama' style='width:350px' class='chzn-select' tabindex='2'>";
 
      $tampil=mysql_query("SELECT * FROM mainmenu ORDER BY nama_menu");
      if ($r[id_main]==0){
echo "<option value=0 selected>- Pilih Menu Utama -</option>";}   

      while($w=mysql_fetch_array($tampil)){
      if ($r[id_main]==$w[id_main]){
echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
      }
      else{
echo "<option value=$w[id_main]>$w[nama_menu]</option></p> ";
      }
	  }
echo "</select>
	 
	  <p> 
      <label>Link</label>
      <span class='field'>
	  <input type=text name='link_sub' value='$r[link_sub]' class='input-xxlarge' />
	  </span>
      </p>";
	  
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='btn btn-primary' id=reset-validate-form href='?module=submenu'>Batal</a>
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