	  <?php
	  //Mencegah direct akses
	  $cek=mysql_query("SELECT COUNT(*) AS cek FROM pengurus 
					    WHERE id_pendaftaran=$_SESSION[pengurus_id]");
	  $ada=mysql_fetch_array($cek);
	
	  if ($ada[cek] == 0){ 
echo" <script>window.location='index.php'</script>";
	  }
	  $aksi="pengurus/modul/mod_profil/aksi_anggota.php";
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
	  
	  $aksi="pengurus/modul/mod_profil/aksi_anggota.php";
	  switch($_GET[act]){
	  // Tampil pendaftaran
	  default:

///// PESAN INPUT ///////////////////////////////////////////////////////////////////

      if(isset($_GET['msg']) && $_GET['msg']=='insert'){
echo "<div class='alert alert-success'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menambahkan pendaftaran.
      </div>";
	  }
        
        
///// PESAN UPDATE /////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
echo "<div class='alert alert-info'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> meg-update pendaftaran.
      </div>";}
      
///// PESAN HAPUS //////////////////////////////////////////////////////////////////

      elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
echo "<div id='content' class='clearfix'>
      <strong>Anda berhasil</strong> menghapus Anggota.
      </div>";}

echo "<form action='$aksi?module=anggota&act=hapussemua' method='post'>
      <div id='content' class='clearfix'>
      <div class='page-container clearfix'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
	  <td> <div class='page-title'>DAFTAR ANGGOTA</div></td>
      <td>
      <input type='submit' class='button-blue' value='Hapus yang terseleksi' style='height: 30px;' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
      </td>
      </ul>
      <span class='clearall'></span>
      </div><br/>
        
      <table style='width: 100%;' border='1' id='dyntable'>
      <thead> 
      <tr> 
      <th class='head0 nosort'><input type='checkbox' name='checkall' class='checkall' /></th>
      <th>No</th>
	  <th>Nama Lengkap</th>
	  <th>No. Pendaftaran</th>
	  <th>NIM</th>
	  <th>Email</th>
	  <th>Terdaftar</th>
	  <th>Tgl. Daftar</th>
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";


    if ($_SESSION[pengurus_level]=='pengurus'){
      $tampil = mysql_query("SELECT * FROM pendaftaran 
										WHERE pilihukm='$_SESSION[pengurus_ukm]'
									    and terdaftar='Diterima'
										ORDER BY id_pendaftaran DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM pendaftaran 
                           WHERE id_pendaftaran='$_SESSION[namauser]'");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
      <td class='aligncenter'><span class='center'><input type='checkbox' name='cek[]' value='$r[id_pendaftaran]'></span></td>
      <td>$no</td> 
	  <td>$r[nama_mahasiswa]</td>
	  <td>$r[no_daftar]</td>
	  <td>$r[nim]</td>
	  <td>$r[email]</td>
	  <td>$r[terdaftar]</td>
	  <td>$r[tanggal]</td>
      <td>
	  <a href='$aksi?module=anggota&act=hapus&id=$r[id_pendaftaran]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
	  <b>Hapus</b></span></a> 
	  </td> 
      </tr>  
      ";
      $no++;
      }
echo "</table>
      </form>
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
     