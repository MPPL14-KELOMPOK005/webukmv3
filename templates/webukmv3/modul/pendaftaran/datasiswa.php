
  <?php
  //Mencegah direct akses
	  if ($_SESSION[member_id] == '' AND $_SESSION[pengurus_id] == ''){
	
echo" <div id='content' class='clearfix'>
  <div class='page-title'>SILAKAN ANDA LOGIN ATAU DAFTAR DAHULU</div><br/>
  
  <div class='post-container clearfix'></div>";
	  }elseif( $_SESSION[member_status] == 'Menunggu Konfirmasi' ){
	
echo" <div id='content' class='clearfix'>
  <div class='page-title'>ANDA MASIH BELUM BISA MENGAKSES HALAMAN INI</div><br/>
  
  <div class='post-container clearfix'></div>";
	  }else{
	  
  $p      = new Paging10;
  $batas  = 9;
  $posisi = $p->cariPosisi($batas);

  echo " 
  <div id='content' class='clearfix'>
  <div class='page-title'>DAFTAR DATA SISWA BARU</div><br/>
  
  <div class='post-container clearfix'>
  
  <table style='width: 100%;' border='1'>
  <tbody>
  <tr><th>No</th>
  <th>Foto</th>
  <th>Keterangan</th>
  </tr>";
 /* if ($_SESSION[member_id] == '' AND $_SESSION[pengurus_id] != ''){
	
$sql = mysql_query("SELECT * FROM pendaftaran WHERE ukm='$_SESSION[pengurus_id]'
  ORDER BY id_pendaftaran DESC LIMIT $posisi,$batas");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1;  
  
	  }elseif( $_SESSION[member_id] != '' AND $_SESSION[pengurus_id] == '' ){
	
  $sql = mysql_query("SELECT * FROM pendaftaran WHERE ukm='$_SESSION[member_ukm]'
  ORDER BY id_pendaftaran DESC LIMIT $posisi,$batas");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1;  
	  } */
  $_SESSION[member_ukm] == $member_ukm;
   $sql = mysql_query("SELECT * FROM pendaftaran WHERE pilihukm='$_SESSION[member_ukm]' OR pilihukm='$_SESSION[pengurus_ukm]' 
  ORDER BY id_pendaftaran DESC LIMIT $posisi,$batas");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1; 
  echo "
  <tr>
  <td width='10px' >$no</td>
  <td width='70px' class='post-image'>
  <a href='$aneka_web/img_anekaweb/profil/$r[gambar]' rel='gallery' title='$r[nama_lengkap]' class='top-tip' data-tips='klik untuk memperbesar gambar'>
  <img src='$aneka_web/img_anekaweb/profil/small_$r[gambar]' width='90'/>
  </a>
  </td>

  <td>
  
  <table width='100%'>
  
  <tr>
  <td>No. Pendaftaran</td> <td>$r[no_daftar]</td>
  </tr>
  
  <tr>
  <td width='20%'>Nama Lengkap</td> <td width='66%'>$r[nama_mahasiswa]</td>
  </tr>
  
  <tr>
  <td>NIM</td> <td>$r[nim]</td>
  </tr>
  
  <tr>
  <td>Email</td> <td>$r[email]</td>
  </tr>
  
  <tr>
  <td>UKM</td> <td>$r[pilihukm]</td>
  </tr>
  
   <tr>
  <td>Status</td> <td>$r[terdaftar]</td>
  </tr>
  
  </table>";
  $no++;}
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM pendaftaran WHERE pilihukm='$_SESSION[member_ukm]' OR pilihukm='$_SESSION[pengurus_ukm]' "));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldatasiswa], $jmlhalaman);
					

  echo "</td></tr>
  </tbody>
  </table>
  </div>
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";}
  ?>
  </div>     
  <!--========= AKHIR SEMUA PENGAJAR ========================-->
  
  
  
  <!--========= SIDEBAR ========================-->
  <?php include "$f[folder]/modul/sidebar/sidebar_home.php";?>
  <!--========= AKHIR SIDEBAR =================-->			