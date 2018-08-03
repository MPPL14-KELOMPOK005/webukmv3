			
  <!--========= ALBUM FOTO ========================-->  
  <div id='content' class='clearfix'>
  <div class='page-title'>GALERI FOTO</div><br/><br/>
				
  <?php
  $p      = new Paging8;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  
  
  $album= mysql_query("SELECT tgl_posting, jam, hari, hits_album, deskripsi, jdl_album, album.id_album, gbr_album, album_seo,   
  COUNT(gallery.id_gallery) as jumlah 
  FROM album LEFT JOIN gallery 
  ON album.id_album=gallery.id_album 
  WHERE album.aktif='Y'  
  GROUP BY id_album
  ORDER BY id_album DESC LIMIT $posisi,$batas");
  while($w=mysql_fetch_array($album)){
  $tgl_posting   = tgl_indo($w[tgl_posting]);
  $hits = $w[hits_album]+1;
  
  $deskripsi = (strip_tags($w[deskripsi]));
  $isi = substr($deskripsi,0,400);
  $isi = substr($deskripsi,0,strrpos($isi," ")); 
  
  mysql_query("UPDATE album SET hits_album='$hits' where id_album='".$val->validasi($_GET['id'],'sql')."'");
	
					
  if ($w['gbr_album']!=''){
  echo " 
  <div class='post-container clearfix'>
  <a href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($w['tgl_posting']))."/$w[id_album]/$w[album_seo]'><img src='$aneka_web/img_anekaweb/album/small_$w[gbr_album]'/></a>
  <article class='post-content'>
  <h1 class='post-title'>
  <a href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($w['tgl_posting']))."/$w[id_album]/$w[album_seo]'>$w[jdl_album]</a></h1>
  
  <div class='post-meta'>
  <div class='comments'>
  <a href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($w['tgl_posting']))."/$w[id_album]/$w[album_seo]'>Jumlah Foto: $w[jumlah]</a> | </div>
  <div class='date'>$w[hari], $tgl_posting</div>
  </div>
  ";}
  echo "	
  <br/>
  <p>$isi...</p>
  </article>
  
  </div>";}
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM album"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halgalerifoto], $jmlhalaman);

  echo " 
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";
  ?>
  </div>     
  <!--========= AKHIR ALBUM FOTO ========================-->  
			  
  <!--========= SIDEBAR ========================-->
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>
  <!--========= AKHIR SIDEBAR =================-->			