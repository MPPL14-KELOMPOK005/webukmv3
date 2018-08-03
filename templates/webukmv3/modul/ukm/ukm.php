<?php
  echo " 
  <div id='content' class='clearfix'>
  <div class='page-title'>ukm SEKOLAH</div><br/>";
    
  $p      = new Paging2;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas); 
  
  $sql = mysql_query("SELECT * FROM ukm ORDER BY id_ukm DESC LIMIT $posisi,$batas");		 
  while($r=mysql_fetch_array($sql)){
  $tgl_posting = tgl_indo($r[tgl_posting]);
  $tgl_mulai   = tgl_indo($r[tgl_mulai]);
  $tgl_selesai = tgl_indo($r[tgl_selesai]);
  $isi_ukm  = nl2br($r[isi_ukm]);
  $tanggalan=explode(' ', $tgl_posting);
  $baca = $r[dibaca]+1;
					
					
  $isi_ukm= htmlentities(strip_tags($r[isi_ukm])); 
  $isi = substr($isi_ukm,0,550); 
  $isi = substr($isi_ukm,0,strrpos($isi," ")); 
			
  if ($r['gambar']!=''){
  
  echo " 
  <div class='post-container clearfix'>
  <a href='$aneka_web/ukm/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_ukm]/$r[tema_seo]'><img src='img_anekaweb/ukm/small_$r[gambar]'/></a>
  <article class='post-content'>
  <h1 class='post-title'><a href='$aneka_web/ukm/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_ukm]/$r[tema_seo]'>$r[tema]</a></h1>

  <div class='post-meta'>
  <div class='date'>$tgl_posting | dibaca $baca pembaca</div>
  </div>";}
  
  echo "	
  
  <p>$isi...</p>
  </article>
  </div>";}
	
			
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM ukm"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halukm], $jmlhalaman);
			

  echo " 
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";
  ?>
  </div>     
  
			  
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>