	  <?php
	  //Mencegah direct akses
	  $cek=mysql_query("SELECT COUNT(*) AS cek FROM pengurus 
					    WHERE id_pendaftaran=$_SESSION[pengurus_id]");
	  $ada=mysql_fetch_array($cek);
	
	  if ($ada[cek] == 0){ 
echo" <script>window.location='index.php'</script>";
	  }
	  $aksi="pengurus/modul/mod_profil/aksi_profil.php";
	  switch($_GET[act]){
  	  // Tampil User
  	  default:
	  
      $tampil=mysql_query("SELECT * FROM pengurus 
                           WHERE id_pendaftaran=$_SESSION[pengurus_id]");
      $r=mysql_fetch_array($tampil);
	  $tgl_lahir = tgl_indo($r[tgl_lahir]);
echo" <div id='content' class='clearfix'>
      <div class='page-container clearfix'>";
	  
echo" <table style='width: 100%;' border='1'>
<tr>
  <td colspan='4'> <div class='page-title'>PROFIL DATA ANDA</div></td>
  </tr>
  <tr><td width='170' height='23'><b>No. pengurus</b></td><td width=7> : </td><td width='580'>$r[no_daftar]</td>";
    if ($r[gambar]!=''){
echo "<td width='200' rowspan='16'><div align='center'><img src='$aneka_web/img_anekaweb/profil/$r[gambar]' width='200' />
      <a href='media.php?module=profilpengurus&act=edituser&id=$r[id_pendaftaran]' class='button-blue'>EDIT FOTO</a>
</div></td>";
      }
	  else{
echo "<td width='200' rowspan='16'><div align='center'><img src='$aneka_web/img_anekaweb/profil/no-image.jpg' width='200'/> 
<a href='media.php?module=profilpengurus&act=edituser&id=$r[id_pendaftaran]' class='button-green'>EDIT FOTO</a></div></td>";
      }
echo "</tr>
		<tr><td><b>Nama Lengkap</b></td>			        <td> : </td><td>$r[nama_mahasiswa]</td>
	    </tr>  
		<tr><td><b>NIM</b></td>			                <td> : </td><td>$r[nim]</td>
	    </tr>  
		
		<tr><td><b>Email</b></td>			        <td> : </td><td>$r[email]</td>
	    </tr>
		<tr><td><b>UKM</b></td>			        <td> : </td><td>$r[pilihukm]</td>
	    </tr>
		<tr><td><b>Status</b></td>			        <td> : </td><td>$r[terdaftar]</td>
	    </tr>";
echo "</table>
			
	  </div>
	  </div>";
      include "$f[folder]/modul/sidebar/sidebar_home.php";
	
      break;
  
      case "edituser":
	  $edit=mysql_query("SELECT * FROM pengurus WHERE id_pendaftaran=$_SESSION[pengurus_id]");
      $r=mysql_fetch_array($edit);
	
echo "<div id='content' class='clearfix'>
      <div class='page-title'>EDIT FOTO ANDA</div><br/><br/>
      <div class='page-container clearfix'>";
	  
	  
echo" <div class='contact-form'>  
      <form method=POST action='$aksi?module=profilpengurus&act=update' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value='$r[id_pendaftaran]'>";
      if ($r[gambar]!=''){
echo "<p> <img src='$aneka_web/img_anekaweb/profil/$r[gambar]' width=100>
      </p>";
	  } 	  

echo "<p><input type=file name='fupload'></p>";
 
echo "<p> <input type='submit' value='UPDATE'></p> 
	  
	  </form>
	 
	  
	  </div>
	  </div>
	  </div>";
      include "$f[folder]/modul/sidebar/sidebar_home.php";
      break;  
      }

	  
?>
     