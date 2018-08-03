
  <div id="content" class="clearfix">
  <div class="page-container clearfix">
  <?php
  $sq = mysql_query("SELECT * from album,users
					 WHERE users.username=album.username 
					 AND album.album_seo='".anti_injection($_GET['jdl_album'])."'");
  $n = mysql_fetch_array($sq);
  $tgl   = tgl_indo($n[tgl_posting]);

  $hits = $n[hits_album]+1;
  mysql_query("UPDATE album SET hits_album='$hits' where album.album_seo='".anti_injection($_GET['jdl_album'])."'");
  
  echo "
  <div class='page-title'>$n[jdl_album]</div>

  <div class='post-meta'>
  <div class='date'>$n[hari], $tgl - $n[jam] WIB</div>|
  <div class='comments'>dilihat: $hits pengunjung</div>

  <div class='addthis_toolbox addthis_default_style'>
  <a class='addthis_button_preferred_1'></a>
  <a class='addthis_button_preferred_2'></a>
  <a class='addthis_button_preferred_3'></a>
  <a class='addthis_button_preferred_4'></a>
  <a class='addthis_button_compact'></a>
  <a class='addthis_counter addthis_bubble_style'></a>
  </div>
  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504c13fd103cdd62'></script>

  </div>
  <p>$n[deskripsi]</p>";
  
  echo " 
    <div id='gallery' class='ad-gallery'>      			    
 	  <div class='ad-image-wrapper'></div>
  	  <div class='ad-nav'>
      <div class='ad-thumbs'>
      <ul class='ad-thumb-list list-unstyled'>";
	  
	  $p      = new Paging6;
      $batas  = 20;
      $posisi = $p->cariPosisi($batas);

      // Tentukan kolom
      $col = 4;

      $g = mysql_query("SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album  
	                             AND album.album_seo='$n[album_seo]' 
	                             ORDER BY id_gallery DESC LIMIT $posisi,$batas");
      $ada = mysql_num_rows($g);
  
      if ($ada > 0) {

      $cnt = 0;
      while ($w = mysql_fetch_array($g)) {
      if ($cnt >= $col) {

      $cnt = 0;}
      $cnt++;

	  
echo "<li><a href='$aneka_web/img_anekaweb/galeri/$w[gbr_gallery]'>
      <img src='$aneka_web/img_anekaweb/galeri/small_$w[gbr_gallery]'
	  title='$w[jdl_gallery]' longdesc='$w[keterangan]' alt='$w[keterangan]' width='90' height='65'/></a></li>";
	  }
	  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery WHERE album.album_seo='$_GET[album]'"));
  
      }else{

echo "</ul>";
echo "<h4>Belum ada foto pada halaman ini. </h4>";}
echo "</div>
	  </div>
	  </div>";
  ?>

  </div>
  
  
    <div class='post-navigation'>

  <?php
  $id = $n['id_album'] - 1;
	  $prev = mysql_query("SELECT * FROM album where id_album='$id'");
	  $p = mysql_fetch_array($prev);
	  $anekaweb = mysql_num_rows($prev);
	  $tgl = tgl_indo($p['tgl_posting']);
	  $hits = $p[hits_album]+1;
	  
	  $judul =(strip_tags($p['jdl_album']));
      $judul = substr($judul,0,35); 
      $judul = substr($judul,0,strrpos($judul," "));
	
	  if ($anekaweb >= 1){
  
echo "<div class='post-previous'>
      <a href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($p['tgl_posting']))."/$p[id_album]/$p[album_seo]' rel='prev'>
      <span>Sebelumnya:</span>$p[jdl_album]</a></div>"; 
	  }else{
echo "<div class='post-previous'><a href='#' rel='prev'>
      <span>Sebelumnya:</span>Tidak ditemukan Galeri Foto Sebelumnya!!!</a></div>";
      }
      $idd = $n['id_album'] + 1;
	  $prevd = mysql_query("SELECT * FROM album where id_album='$idd'");
	  $pd = mysql_fetch_array($prevd);
	  $anekaweb1 = mysql_num_rows($prevd);
	  
	  
	  $tgl = tgl_indo($pd['tgl_posting']);
	  $hits = $pd[hits_album]+1;
	  
	  $judul =(strip_tags($pd['jdl_album']));
      $judul = substr($judul,0,35); 
      $judul = substr($judul,0,strrpos($judul," "));
	
	  if ($anekaweb1 >= 1){
echo "<div class='post-next'>
      <a href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($pd['tgl_posting']))."/$pd[id_album]/$pd[album_seo]' rel='next'>
      <span>Selanjutnya:</span> $pd[jdl_album]</a></div>";
      }else{
echo "<div class='post-next'>
      <a href='#' rel='next'>
      <span>Selanjutnya:</span> Tidak ditemukan Galeri Foto Selanjutnya!!!</a></div>";
	  }
  ?>
  
  </div>
  

  
  <?php
  echo "<div id='reply' class='clearfix'>
        <div class='contact-form'>
        <div class='fb-comments' data-href='$aneka_web/galeri-foto/".date('Y/m/d',strtotime($n['tgl_posting']))."/$n[id_album]/$n[album_seo]' data-num-posts='20' data-width='100%'></div>
	    </div> 
	    </div>";  
   ?>



  </div>
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>