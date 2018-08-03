
  <?php
  //Mencegah direct akses
	  if ($_SESSION[member_id] == '' AND $_SESSION[pengurus_id] == '' ){
	
echo" <div id='content' class='clearfix'>
  <div class='page-title'>SILAKAN ANDA LOGIN ATAU DAFTAR DAHULU</div><br/>
  
  <div class='post-container clearfix'></div>";
	  }elseif( $_SESSION[member_status] == 'Menunggu Konfirmasi' ){
	
echo" <div id='content' class='clearfix'>
  <div class='page-title'>ANDA MASIH BELUM BISA MENGAKSES HALAMAN INI</div><br/>
  
  <div class='post-container clearfix'></div>";
	  }	  
	  else{
  $p      = new Paging9;
  $batas  = 9;
  $posisi = $p->cariPosisi($batas);

  echo " 
  <div id='content' class='clearfix'>
  <div class='page-title'>JADWAL KEGIATAN</div><br/>
  
  <div class='post-container clearfix'>
  
  <table style='width: 100%;' border='1'>
  <tbody>
  <tr><th>No</th>
  <th>Detail Jadwal Kegiatan</th>
  </tr>";

  $sql = mysql_query("SELECT * FROM jadwal WHERE ukm='$_SESSION[member_ukm]' OR ukm='$_SESSION[pengurus_ukm]' 
  ORDER BY id_jadwal DESC LIMIT $posisi,$batas");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1;  
   
  echo "
  <tr>
  <td width='10px' >$no</td>
  

  <td>
  
  <table width='93%'>
  
  <tr>
  <td width='34%'>Nama Kegiatan</td> <td width='66%'>$r[nama_kegiatan]</td>
  </tr>
  
  <tr>
  <td>Tempat</td> <td>$r[tempat]</td>
  </tr>
  
  <tr>
  <td>Tanggal</td> <td>$r[tanggal]</td>
  </tr>
  
  <tr>
  <td>Waktu</td> <td>$r[jam]</td>
  </tr>
  
  <tr>
  <td>Keterangan</td> <td>$r[keterangan]</td>
  </tr>
  
  </table>";
  $no++;}
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM jadwal WHERE ukm='$_SESSION[member_ukm]' OR ukm='$_SESSION[pengurus_ukm]'  "));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halpengajar], $jmlhalaman);
					

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