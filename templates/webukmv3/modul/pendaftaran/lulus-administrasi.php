
  <?php

  echo " 
  <div id='content' class='clearfix'>
  <div class='page-title'>Siswa yang lulus Administrasi akan di keluar dalam 3 hari setelah pendaftaran.</div><br/>
  
  <div class='post-container clearfix'>
  
  <table style='width: 100%;' border='1'>
  <tbody>
  <tr><th>No</th>
  <th>Foto</th>
  <th>Keterangan</th>
  </tr>";
  $p      = new Paging11;
  $batas  = 9;
  $posisi = $p->cariPosisi($batas);

  $sql = mysql_query("SELECT * FROM pendaftaran WHERE terdaftar='Diterima' AND id_pendaftaran=$_SESSION[member_id]");	
  $no = $posisi+1;
  while($r=mysql_fetch_array($sql)){
  $tgl = tgl_indo($r[tanggal]);	
  $baca = $r[dibaca]+1;  
   
  echo "
  <tr>
  <td width='10px' >$no</td>
  <td width='70px' class='post-image'>
  <a href='$aneka_web/img_anekaweb/profil/$r[gambar]' rel='gallery' title='$r[judul]' class='top-tip' data-tips='klik untuk memperbesar gambar'>
  <img src='$aneka_web/img_anekaweb/profil/small_$r[gambar]' width='90'/>
  </a>
  </td>

  <td>
  
  <table width='93%'>
  
  <tr>
  <td width='34%'>No. Pendaftaran</td> <td width='66%'>$r[no_daftar]</td>
  </tr>
  
  <tr>
  <td>Nama Lengkap</td> <td>$r[nama_siswa]</td>
  </tr>
  
  <tr>
  <td>Asal Sekolah</td> <td>$r[sekolah]</td>
  </tr>
  
  <tr>
  <td>Print Kartu Ujian</td> <td><a target='_BLANK' href='print-kartu-ujian.php?no_daftar=$r[no_daftar]' class='button-blue'>Print Kartu Tes Ujian</a></td>
  </tr>
  
  </table>";
  $no++;}
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM pendaftaran  WHERE terdaftar='Diterima'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halhasillulusadministrasi], $jmlhalaman);
					

  echo "</td></tr>
  </tbody>
  </table>
  </div>
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";
  ?>
  </div>     
  <!--========= AKHIR SEMUA PENGAJAR ========================-->
  
  
  
  <!--========= SIDEBAR ========================-->
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>
  <!--========= AKHIR SIDEBAR =================-->			