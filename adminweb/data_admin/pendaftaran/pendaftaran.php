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
	  
	  $aksi="data_admin/pendaftaran/aksi_pendaftaran.php";
	  switch($_GET[act]){
	  // Tampil pendaftaran
	  default:
echo "<div class='pagetitle'><h1>Pendaftaran Siswa Baru</h1> </div>";

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
echo "<div class='alert alert-error'>
      <button data-dismiss='alert' class='close' type='button'>x</button>
      <strong>Anda berhasil</strong> menghapus pendaftaran.
      </div>";}

echo "<form action='$aksi?module=pendaftaran&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
	  <div id='mail'>
      <div class='msghead'>
      <ul class='msghead_menu'>
      <li>
      <input type='submit' class='btn btn-primary' value='Hapus yang terseleksi' style='height: 30px;' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\">
      </li>
      </ul>
      <span class='clearall'></span>
      </div><br/>
        
      <table class='table table-bordered mailinbox' id='dyntable'>
      <thead> 
      <tr> 
      <th class='head0 nosort'><input type='checkbox' name='checkall' class='checkall' /></th>
      <th>No</th>
	  <th>Nama Siswa</th>
	  <th>No. Pendaftaran</th>
	  <th>NISN</th>
	  <th>No.Telp/HP</th>
	  <th>Terdaftar</th>
	  <th>Tgl. Daftar</th>
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";


    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM pendaftaran ORDER BY id_pendaftaran DESC");
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
	  <td>$r[nama_siswa]</td>
	  <td>$r[no_daftar]</td>
	  <td>$r[nisn]</td>
	  <td>$r[telp]</td>
	  <td>$r[terdaftar]</td>
	  <td>$r[tanggal]</td>
      <td>
	  <a href=?module=pendaftaran&act=editpendaftaran&id=$r[id_pendaftaran] title='Edit' class='with-tip'>
	  <span class='icon-edit'></span></a> 
	  <a href='$aksi?module=pendaftaran&act=hapus&id=$r[id_pendaftaran]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\"><span class='icon-trash'></span></a> 
	  </td> 
      </tr>  
      ";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break;    
  
///// EDIT CUSTOMER ////////////////////////////////////////////////////////////////////////////////////////
    
case "editpendaftaran":
    $sql  = mysql_query("SELECT * FROM pendaftaran WHERE id_pendaftaran='$_GET[id]'");
    $r    = mysql_fetch_array($sql);
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'>BIODATA SISWA</h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='$aksi?module=pendaftaran&act=update' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value='$r[id_pendaftaran]'>
	  <input type=hidden name=terdaftar value='$r[terdaftar]'>
	  
<table style='width: 100%;' border='1'>
<tr>
  <td colspan='4'> <div class='page-title'>PROFIL DATA ANDA</div></td>
  </tr>
  <tr><td width='170' height='23'><b>No. Pendaftaran</b></td><td width=7> : </td><td width='580'>$r[no_daftar]</td>";
    if ($r[gambar]!=''){
echo "<td width='200' rowspan='16'><div align='center'><img src='../img_anekaweb/profil/$r[gambar]' width='200' /></td>";
      }
	  else{
echo "<td width='200' rowspan='16'><div align='center'><img src='../img_anekaweb/profil/no-image.jpg' width='200'/> </td>";
      }
echo "</tr>
		<tr><td><b>Nama Lengkap</b></td>			<td> : </td><td>$r[nama_siswa]</td>
	    </tr>    
		<tr><td><b>NISN</b></td>			<td> : </td><td>$r[nisn]</td>
	    </tr> 
		<tr><td><b>Tempat / Tgl. Lahir</b></td>				<td> : </td><td>$r[tempat_lahir], $r[tgl_lahir]</td>
	    </tr>
		<tr><td><b>Jenis Kelamin</b></td>			        <td> : </td><td>$r[jenis_kelamin]</td>
	    </tr>
		<tr><td><b>Golongan Darah</b></td>			        <td> : </td><td>$r[gol_drh]</td>
	    </tr>
		<tr><td><b>Berat / Tinggi</b></td>			        <td> : </td><td>$r[berat]kg, $r[tinggi]cm</td>
	    </tr>
		<tr><td><b>Alamat Lengkap</b></td>			        <td> : </td><td>$r[alamat] $r[kodepos]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td>$r[agama]</td>
	    </tr>
		<tr><td><b>Asal Sekolah</b></td>			        <td> : </td><td>$r[sekolah]</td>
	    </tr>
		<tr><td><b>Alamat Sekolah</b></td>			        <td> : </td><td>$r[alamat_sekolah]</td>
	    </tr>
		<tr><td><b>Tahun Lulus</b></td>			        <td> : </td><td>$r[tahun_lulus]</td>
	    </tr>
		<tr><td><b>No. Ijazah</b></td>			        <td> : </td><td>$r[ijazah]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			        <td> : </td><td>$r[telp]</td>
	    </tr>
		<tr><td><b>Email</b></td>			        <td> : </td><td>$r[email]</td>
	    </tr>
		<tr><td><b>Pilihan Jurusan</b></td>			        <td> : </td><td>$r[jurusan1] / $r[jurusan2]</td>
	    </tr>
		<tr><td><b>Nilai UN</b></td>			        <td> : </td><td>Matematika: $r[mtk], B. Inggris: $r[bin], Biologi: $r[big], IPA: $r[ipa]</td>
	    </tr>
		
		<tr><td colspan='4'> <div class='page-title'>PROFIL DATA ORANG TUA</div></td></tr>
		<tr><td><b>Nama Ayah</b></td>			    <td> : </td><td colspan='2'>$r[nama_ayah]</td>
	    </tr>
		<tr><td><b>Nama Ibu</b></td>			    <td> : </td><td colspan='2'>$r[nama_ibu]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			    <td> : </td><td colspan='2'>$r[telp_ortu]</td>
	    </tr>
		<tr><td><b>Pekerjaan Ayah</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_ayah]</td>
	    </tr>
		<tr><td><b>Pekerjaan Ibu</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_ibu]</td>
	    </tr>
		<tr><td><b>Alamat</b></td>			        <td> : </td><td colspan='2'>$r[alamat_ortu]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td colspan='2'>$r[agama_ortu]</td>
	    </tr>
		
		<tr><td colspan='4'> <div class='page-title'>PROFIL DATA WALI</div></td></tr>
		<tr><td><b>Nama Wali</b></td>			    <td> : </td><td colspan='2'>$r[nama_wali]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			    <td> : </td><td colspan='2'>$r[telp_wali]</td>
	    </tr>
		<tr><td><b>Pekerjaan Wali</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_wali]</td>
	    </tr>
		<tr><td><b>Alamat</b></td>			        <td> : </td><td colspan='2'>$r[alamat_wali]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td colspan='2'>$r[agama_wali]</td>
	    </tr>";
			  
      if ($r[terdaftar]=='Baru'){
echo "<tr><td><b>Terdaftar</b></td>
<td> : </td><td colspan='2'>
     <input type=radio name='terdaftar' value='Diterima'>Diterima
	  <input type=radio name='terdaftar' value='Baru' checked>Baru</td>
	  </tr>";
	  }
	  else{
echo "<tr><td><b>Terdaftar</b></td>
<td> : </td><td colspan='2'>
      <input type=radio name='terdaftar' value='Diterima' checked>Diterima
	  <input type=radio name='terdaftar' value='Baru'>Baru</td>
	  </tr>";
	  }
echo "</table><p class='stdformbutton'>
      <input type='submit' name='AnekaWeb' class='btn' style='padding-top: 4px; padding-bottom: 5px;' value='Simpan'>
      <a target='_BLANK' class='btn btn-primary' id=reset-validate-form href='print-form.php?no_daftar=$r[no_daftar]'>Print Data Siswa</a>
      </p> 
	  </form>
      </div>
      </div>";
	
    break;  
	
///// SISWA LULUS ADMINISTRATOR ////////////////////////////////////////////////////////////////////////////////////////
    
case "siswalulusadministrasi":
echo "<div class='pagetitle'><h1>Daftar Siswa Baru yang Lulus Seleksi Administrasi.</h1> </div>
	  
      <form action='$aksi?module=pendaftaran&act=hapussemua' method='post'>
      <div class='maincontent'>
      <div class='contentinner'>
       
        
      <table class='table table-bordered mailinbox' id='dyntable'>
      <thead> 
      <tr> 
      <th>No</th>
	  <th>Nama Siswa</th>
	  <th>No. Pendaftaran</th>
	  <th>NISN</th>
	  <th>No.Telp/HP</th>
	  <th>Terdaftar</th>
	  <th>Tgl. Daftar</th>
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";


    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM pendaftaran WHERE terdaftar='Diterima' ORDER BY no_daftar DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM pendaftaran WHERE terdaftar='Diterima' 
                           AND no_daftar='$_SESSION[namauser]'");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
      <td>$no</td> 
	  <td>$r[nama_siswa]</td>
	  <td>$r[no_daftar]</td>
	  <td>$r[nisn]</td>
	  <td>$r[telp]</td>
	  <td>$r[terdaftar]</td>
	  <td>$r[tanggal]</td>
      <td>
	  <a href=?module=pendaftaran&act=detailsiswalulusadministrasi&id=$r[no_daftar] title='Edit' class='with-tip'>
	  <span class='icon-edit'></span></a> 
	  <a href='$aksi?module=pendaftaran&act=hapus&id=$r[no_daftar]' onClick=\"return confirm('Anda yakin menu ini akan dihapus?');\"><span class='icon-trash'></span></a> 
	  </td> 
      </tr>  
      ";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break;    

////////////////////////DETAIL SISWA LULUS ADMINISTRASI /////////////////////////////////////////////////////
case "detailsiswalulusadministrasi":
    $sql  = mysql_query("SELECT * FROM pendaftaran WHERE no_daftar='$_GET[id]'");
    $r    = mysql_fetch_array($sql);
	
	$sql2=mysql_query("SELECT * FROM hasil_ujian WHERE no_ujian='$_GET[id]'");
    $rr=mysql_fetch_array($sql2);
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'> DATA PENDAFTARAN SISWA BARU - $r[nama_siswa] </h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='?module=pendaftaran&act=statusaksi' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value='$r[no_daftar]'>
	  <input type=hidden name=terdaftar value='$r[terdaftar]'>
	  
<table style='width: 100%;' border='1'>
  <tr><td width='170' height='23'><b>No. Pendaftaran</b></td><td width=7> : </td><td width='580'>$r[no_daftar]  ";
  if ($r[terdaftar]=='Baru'){
echo "<tr><td><b>Terdaftar</b></td>
<td> : </td><td colspan='2'>
     <input type=radio name='terdaftar' value='Diterima'>Diterima
	  <input type=radio name='terdaftar' value='Baru' checked>Baru
	  ";
	  }
	  else{
echo "<tr><td><b>Terdaftar</b></td>
 <td> : </td><td colspan='2'>
      <input type=radio name='terdaftar' value='Diterima' checked>Diterima
	  <input type=radio name='terdaftar' value='Baru'>Baru
	  ";
	  }
echo "<input type='submit' name='AnekaWeb' class='btn' value='Ganti Terdaftar'>
      
	  </form></td>
	  </tr></td></tr>
  
   
		<tr><td><b>Nama Lengkap</b></td>			<td> : </td><td>$r[nama_siswa]</td>
	    </tr>    
		<tr><td><b>NISN</b></td>			<td> : </td><td>$r[nisn]</td>
	    </tr> 
		<tr><td><b>Tempat / Tgl. Lahir</b></td>				<td> : </td><td>$r[tempat_lahir], $r[tgl_lahir]</td>
	    </tr>
		<tr><td><b>Jenis Kelamin</b></td>			        <td> : </td><td>$r[jenis_kelamin]</td>
	    </tr>
		<tr><td><b>Golongan Darah</b></td>			        <td> : </td><td>$r[gol_drh]</td>
	    </tr>
		<tr><td><b>Berat / Tinggi</b></td>			        <td> : </td><td>$r[berat]kg, $r[tinggi]cm</td>
	    </tr>
		<tr><td><b>Alamat Lengkap</b></td>			        <td> : </td><td>$r[alamat] $r[kodepos]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td>$r[agama]</td>
	    </tr>
		<tr><td><b>Asal Sekolah</b></td>			        <td> : </td><td>$r[sekolah]</td>
	    </tr>
		<tr><td><b>Alamat Sekolah</b></td>			        <td> : </td><td>$r[alamat_sekolah]</td>
	    </tr>
		<tr><td><b>Tahun Lulus</b></td>			        <td> : </td><td>$r[tahun_lulus]</td>
	    </tr>
		<tr><td><b>No. Ijazah</b></td>			        <td> : </td><td>$r[ijazah]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			        <td> : </td><td>$r[telp]</td>
	    </tr>
		<tr><td><b>Email</b></td>			        <td> : </td><td>$r[email]</td>
	    </tr>
		<tr><td><b>Pilihan Jurusan</b></td>			        <td> : </td><td>$r[jurusan1] / $r[jurusan2]</td>
	    </tr>
		<tr><td><b>Nilai UN</b></td>			        <td> : </td><td>Matematika: $r[mtk], B. Inggris: $r[bin], Biologi: $r[big], IPA: $r[ipa]</td>
	    </tr>";
		
echo "<form method=POST action='?module=pendaftaran&act=nilaisiswa'>
	  <input type=hidden name='id' size=69 value='$r[no_daftar]' class='input2'>
	  <tr>
	  <td><b>Nilai Ujian</b></td> 	<td> : </td><td><input name='nilai' value='$rr[nilai]' type=text>
	  <input style='padding:7px;' type=submit value='Simpan Nilai' class='btn'>
	  </td></tr>
	  </form>		  
     
      </table>
      </div>
      </div>";
	
    break;  
	
////////////////////////Hasil Ujian Siswa /////////////////////////////////////////////////////////////////////////////	

case "hasilujian":
echo "<div class='pagetitle'><h1>Daftar Hasil Nilai Siswa yang Lulus Ujian.</h1> </div>
	  
      <div class='maincontent'>
      <div class='contentinner'>
      <table class='table table-bordered mailinbox' id='dyntable'>
      <thead> 
      <tr> 
      <th>No</th>
	  <th>Nama Siswa</th>
	  <th>No. Ujian</th>
	  <th>Nilai Ujian</th>
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";


    if ($_SESSION[leveluser]=='admin'){
	
	 $tampil = mysql_query("SELECT * FROM hasil_ujian left join pendaftaran on hasil_ujian.id_hasil=pendaftaran.id_pendaftaran ORDER BY nilai DESC");
    }
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
      <td>$no</td> 
	  <td>$r[nama_siswa]</td>
	  <td>$r[no_ujian]</td>
	  <td>$r[nilai]</td>
      <td>
	  <a href='?module=pendaftaran&act=daftarulang&id=$r[no_daftar]' class='btn btn-rounded'><span class='icon-user'></span> &nbsp; Daftar Ulang</a> 
	  <a href=?module=pendaftaran&act=detailsiswalulusadministrasi&id=$r[no_daftar] class='btn btn-rounded'>
	  <span class='icon-edit'></span> &nbsp; Edit</a> 
	  </td> 
      </tr>  
      ";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break;    

////////////////////////DETAIL SISWA LULUS ADMINISTRASI /////////////////////////////////////////////////////
case "daftarulang":
    $sql  = mysql_query("SELECT * FROM pendaftaran WHERE no_daftar='$_GET[id]'");
    $r    = mysql_fetch_array($sql);
	
	$sql2=mysql_query("SELECT * FROM hasil_ujian WHERE no_ujian='$_GET[id]'");
    $rr=mysql_fetch_array($sql2);
	  
echo "<div class='maincontent'>
	  <div class='contentinner'>
	  <h4 class='widgettitle nomargin'> PENDAFTARAN ULANG - $r[nama_siswa] </h4>
	  <div class='widgetcontent bordered'>
	  <div class='row-fluid'>
	  
	  <form method=POST action='?module=pendaftaran&act=aksidaftarulang' enctype='multipart/form-data' class='stdform'>
	  <input type=hidden name=id value='$r[no_daftar]'>
	  <input type=hidden name=terdaftar value='$r[terdaftar]'>
	  
<table style='width: 100%;' border='1'>
  <tr><td width='170' height='23'><b>No. Pendaftaran</b></td><td width=7> : </td><td width='580'>$r[no_daftar]  </td></tr>
  
   
		<tr><td><b>Nama Lengkap</b></td>			<td> : </td><td>$r[nama_siswa]</td>
	    </tr>    
		<tr><td><b>NISN</b></td>			<td> : </td><td>$r[nisn]</td>
	    </tr> 
		<tr><td><b>Tempat / Tgl. Lahir</b></td>				<td> : </td><td>$r[tempat_lahir], $r[tgl_lahir]</td>
	    </tr>
		<tr><td><b>Alamat Lengkap</b></td>			        <td> : </td><td>$r[alamat] $r[kodepos]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td>$r[agama]</td>
	    </tr>
		<tr><td><b>Asal Sekolah</b></td>			        <td> : </td><td>$r[sekolah]</td>
	    </tr>
		<tr><td><b>Alamat Sekolah</b></td>			        <td> : </td><td>$r[alamat_sekolah]</td>
	    </tr>
		<tr><td><b>Tahun Lulus</b></td>			        <td> : </td><td>$r[tahun_lulus]</td>
	    </tr>
		<tr><td><b>No. Ijazah</b></td>			        <td> : </td><td>$r[ijazah]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			        <td> : </td><td>$r[telp]</td>
	    </tr>
		<tr><td><b>Email</b></td>			        <td> : </td><td>$r[email]</td>
	    </tr>
		<tr><td><b>Pilihan Jurusan</b></td>			        <td> : </td><td>$r[jurusan1] / $r[jurusan2]</td>
	    </tr>
		<tr><td><b>Nilai UN</b></td>			        <td> : </td><td>Matematika: $r[mtk], B. Inggris: $r[bin], Biologi: $r[big], IPA: $r[ipa]</td>
	    </tr>";
		
echo "<tr>
	  <td><b>Uang Sekolah</b></td> 	<td> : </td><td><input name='uang_sekolah' value='$r[uang_sekolah]' type=text>
	  <input style='padding:7px;' type=submit value='Daftar Ulang' class='btn'>
	  </td></tr>		  
     
      </table>
      </div>
      </div>";
	
    break;  
/////////////DATA DAFTAR ULANG/////////////////////////////////////////////////////////////////////////////////////////////////
	case "datadaftarulang":
	echo "<div class='pagetitle'><h1>Daftar Siswa yang Sudah Daftar Ulang</h1> </div>
	  
      <div class='maincontent'>
      <div class='contentinner'>
      <table class='table table-bordered mailinbox' id='dyntable'>
      <thead> 
      <tr> 
      <th>No</th>
	  <th>Nama Siswa</th>
	  <th>No. Pendaftaran</th>
	  <th>Asal Sekolah</th>
	  <th>Uang Sekolah</th>
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";


    if ($_SESSION[leveluser]=='admin'){
	
	 $tampil = mysql_query("SELECT * FROM pendaftaran ORDER BY id_pendaftaran DESC");
    }
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
      <td>$no</td> 
	  <td>$r[nama_siswa]</td>
	  <td>$r[no_daftar]</td>
	  <td>$r[sekolah]</td>
	  <td>$r[uang_sekolah]</td>
      <td>
	  <a href=?module=pendaftaran&act=detailsiswalulusadministrasi&id=$r[no_daftar] title='Edit' class='with-tip'>
	  <span class='icon-edit'></span></a> 
	  </td> 
      </tr>  
      ";
      $no++;
      }
echo "</table>
      </form>
	  </div>";

      break;    
/////////////AKSI DAFTAR ULANG/////////////////////////////////////////////////////////////////////////////////////////////////

	case "aksidaftarulang":
     mysql_query("UPDATE pendaftaran SET uang_sekolah = '$_POST[uang_sekolah]' 
                                  WHERE  no_daftar = '$_POST[id]'");
									
  echo "<script>window.alert('Sukses Simpan Data Daftar Ulang.');
				window.location='?module=pendaftaran&act=hasildaftarulang'</script>";	
break;

/////////////////////////////Status Aksi///////////////////////////////////////////////////////////////////////////////

case "statusaksi":
 mysql_query("UPDATE pendaftaran SET terdaftar = '$_POST[terdaftar]' 
                              WHERE  no_daftar = '$_POST[id]'");
  echo "<script>window.alert('Sukses Update Status.');
				window.location='?module=pendaftaran&act=detailsiswalulusadministrasi&id=$_POST[id]'</script>";	
break;

/////////////////////////////Nilai Siswa///////////////////////////////////////////////////////////////////////////////
case "nilaisiswa":
    mysql_query("INSERT INTO hasil_ujian (no_ujian,
										  nilai) 
								   VALUES('$_POST[id]',
										  '$_POST[nilai]')");
									
  echo "<script>window.alert('Sukses Simpan Nilai Ujian.');
				window.location='?module=pendaftaran&act=detailsiswalulusadministrasi&id=$_POST[id]'</script>";	
break;
   }
   }
   ?>
