
  <?php
  //Mencegah direct akses
	  if ($_SESSION[member_id] == ''){
	
echo" <div id='content' class='clearfix'>
  <div class='page-title'>SILAKAN ANDA LOGIN ATAU DAFTAR DAHULU</div><br/>
  
  <div class='post-container clearfix'></div>";
	  }else{
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
  <th>Foto Diri</th>
  <th>Profil Pengajar</th>
  </tr>";

  $sql = mysql_query("SELECT * FROM profil_guru 
  ORDER BY id_profil_guru DESC LIMIT $posisi,$batas");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1;  
   
  echo "
  <tr>
  <td width='10px' >$no</td>
  <td width='70px' class='post-image'>
  <a href='$aneka_web/img_anekaweb/profilguru/$r[gambar]' rel='gallery' title='$r[judul]' class='top-tip' data-tips='klik untuk memperbesar gambar'>
  <img src='$aneka_web/img_anekaweb/profilguru/small_$r[gambar]' width='70'/>
  </a>
  </td>

  <td>
  
  <table width='93%'>
  
  <tr>
  <td width='34%'>Nama</td> <td width='66%'>$r[judul]</td>
  </tr>
  
  <tr>
  <td>Jabatan</td> <td>$r[jabatan]</td>
  </tr>
  
  <tr>
  <td>NIP</td> <td>$r[nip]</td>
  </tr>
  
  <tr>
  <td>Tempat Tgl. Lahir</td> <td>$r[lahir]</td>
  </tr>
  
  <tr>
  <td>Alamat</td> <td>$r[alamat]</td>
  </tr>
  
  </table>";
  $no++;}
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM profil_guru"));
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
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>
  <!--========= AKHIR SIDEBAR =================-->			