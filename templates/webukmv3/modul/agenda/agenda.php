<?php
  echo " 
  <div id='content' class='clearfix'>
  <div class='page-title'>AGENDA SEKOLAH</div><br/>";
    
  $p      = new Paging2;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas); 
  
  $sql = mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
  while($r=mysql_fetch_array($sql)){
  $tgl_posting = tgl_indo($r[tgl_posting]);
  $tgl_mulai   = tgl_indo($r[tgl_mulai]);
  $tgl_selesai = tgl_indo($r[tgl_selesai]);
  $isi_agenda  = nl2br($r[isi_agenda]);
  $tanggalan=explode(' ', $tgl_posting);
  $baca = $r[dibaca]+1;
					
					
  $isi_agenda= htmlentities(strip_tags($r[isi_agenda])); 
  $isi = substr($isi_agenda,0,550); 
  $isi = substr($isi_agenda,0,strrpos($isi," ")); 
			
  if ($r['gambar']!=''){
  
  echo " 
  <div class='post-container clearfix'>
  <a href='$aneka_web/agenda/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_agenda]/$r[tema_seo]'><img src='img_anekaweb/agenda/small_$r[gambar]'/></a>
  <article class='post-content'>
  <h1 class='post-title'><a href='$aneka_web/agenda/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_agenda]/$r[tema_seo]'>$r[tema]</a></h1>

  <div class='post-meta'>
  <div class='date'>$tgl_posting | dibaca $baca pembaca</div>
  </div>";}
  
  echo "	
  
  <p>$isi...</p>
  </article>
  </div>";}
	
			
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halagenda], $jmlhalaman);
			

  echo " 
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";
  ?>
  </div>     
  
			  
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>