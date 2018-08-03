	  <?php
	  //Mencegah direct akses
	  $cek=mysql_query("SELECT COUNT(*) AS cek FROM pengurus 
					    WHERE id_pendaftaran=$_SESSION[pengurus_id]");
	  $ada=mysql_fetch_array($cek);
	
	  if ($ada[cek] == 0){ 
echo" <script>window.location='index.php'</script>";
	  }
	  $aksi="pengurus/modul/mod_profil/aksi_jadwal.php";
	  switch($_GET[act]){
  	  // Tampil User
  	  default:
	  
     
	  
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
      if (empty($_SESSION['pengurus_id']) AND empty($_SESSION['member_passuser'])){
	  } 
      else{
	  
	  $aksi="pengurus/modul/mod_profil/aksi_jadwal.php";
	  switch($_GET[act]){
	  // Tampil pendaftaran
	  default:

///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan Jadwal Kegiatan.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update Jadwal Kegiatan.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div id='content' class='clearfix'>
      <strong>Anda berhasil</strong> menghapus Jadwal Kegiatan.
      </div>";}

echo "<form action='$aksi?module=jadwalpengurus&act=hapussemua' method='post'>
      <div id='content' class='clearfix'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
	  <td> <div class='page-title'>DAFTAR KEGIATAN</div></td>
      <td>
      <li>
      <a href='?module=jadwalpengurus&act=tambahjadwal' button class='button-blue' >Tambah Kegiatan</button></a>
      <input type='submit' class='button-blue' value='Hapus yang terseleksi' style='height: 30px;' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
      </li>
      </ul>
      <span class='clearall'></span>
      </div><br/>
        
      <table cstyle='width: 100%;' border='1' id='dyntable'>
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
      <th class='head1'>Nama Kegiatan</th>
      <th class='head1'>Tempat</th>
      <th class='head0'>Tanggal</th>
      <th class='head0'>Jam</th>
	  <th class='head0'>Keterangan</th>
      <th class='head1'><center>Aksi<center></th>
      </tr>
      </thead>";
       
      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM jadwal ORDER BY id_jadwal DESC");
	  }
	  else{
      $tampil=mysql_query("SELECT * FROM jadwal 
                                    WHERE ukm='$_SESSION[pengurus_ukm]'       
                                    ORDER BY id_jadwal DESC");
	  } 
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
	  
      $tgl   = tgl_indo($r[tanggal]);
       
echo "<tr class=gradeX>
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_profil_guru]'></span></td>
	  <td>$no</td> 
      <td>$r[nama_kegiatan]</td>
      <td>$r[tempat]</td>
      <td>$r[tanggal]</td>
	  <td>$r[jam]</td>
	  <td>$r[keterangan]</td>
      <td>
      <a href=?module=jadwalpengurus&act=editjadwal&id=$r[id_profil_guru]><b>Edit</b></span></a> /
	  <a href='$aksi?module=jadwalpengurus&act=hapus&id=$r[id_jadwal]' onClick=\"return confirm('Anda yakin jadwal ini akan dihapus?');\">
	  <b>Hapus</b></span></a> 
      </td> 
      </tr>"; 
      $no++;
	  } 
echo "</table>
      </form>
	  </div>
	  </div>
	  </div>"; 
	  
      break;   
	  
	  
///// TAMBAH jadwal ////////////////////////////////////////////////////////////////////////////////////////

	  case "tambahjadwal":
	  
echo "<div id='content' class='clearfix'>
	  <div class='contentinner'>
	  <h4 class='page-title'>Tambah Jadwal Kegiatan</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=jadwalpengurus&act=input' enctype='multipart/form-data' class='stdform'>
	  <table cstyle='width: 100%;' border='1' id='dyntable'>
	  <tr>
       <td>Nama Kegiatan</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type='text' name='namakegiatan' class='input-xxlarge' />
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Tempat</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type='text' name='tempat' class='input-xxlarge' />
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Tanggal</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type='date' name='tanggal' class='input-xxlarge' />
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Waktu</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type='text' name='waktu' class='input-xxlarge' />
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Keterangan</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type='text' name='keterangan' class='input-xxlarge' />
			</span>
	   </td>
      </tr>
	  
	 </table> 
	  
			  
      </p>
      <p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='button-blue' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='button-blue' id=reset-validate-form href='?module=jadwalpengurus'>Batal</a>
      </p>
	
	  </form>
	  </div>
	  </div>
	  </div>
	  </div>"; 
	  
	  break;
	  
///// EDIT profilguru///////////////////////////////////////////////////////////////////////////////////////////////////////

	  case "editjadwal":
	  $edit = mysql_query("SELECT * FROM jadwal WHERE id_jadwal='$_GET[id]'");
  	  $r    = mysql_fetch_array($edit);


echo "<div id='content' class='clearfix'>
	  <div class='contentinner'>
	  <h4 class='page-title'>Edit Jadawl Kegiatan</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>

	  <form method=POST enctype='multipart/form-data' action=$aksi?module=jadwalpengurus&act=update class='stdform'>
	  <input type=hidden name=id value=$r[id_jadwal]>
	  <table cstyle='width: 100%;' border='1' id='dyntable'>
	  <tr>
       <td>Nama Kegiatan</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type=text name='namakegiatan' class='input-xxlarge' value='$r[nama_kegiatan]'>
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Tempat</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type=text name='tempat' class='input-xxlarge' value='$r[tempat]'>
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Tanggal</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type=date name='tanggal' class='input-xxlarge' value='$r[tanggal]'>
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Waktu</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type=text name='waktu' class='input-xxlarge' value='$r[waktu]'>
			</span>
	   </td>
      </tr>
	  
	  <tr>
       <td>Keterangan</td>
       <td> : </td>
       <td>
			<span class='field'>
			<input type=text name='keterangan' class='input-xxlarge' value='$r[keterangan]'>
			</span>
	   </td>
      </tr>
	  
	 </table> 
	  
	  
		";
 
 
echo "<p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='button-blue' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a class='button-blue' id=reset-validate-form href='?module=jadwalpengurus'>Batal</a>
      </p>
 
      </form>
      </div>
      </div>
	  </div>
      </div>";
	  break;
  	
   }
   }
      include "$f[folder]/modul/sidebar/sidebar_home.php";
      break;  
      }

	  
?>
     