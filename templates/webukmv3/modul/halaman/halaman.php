<div id='content' class='clearfix'>
  
  
  <?php		
  $detail=mysql_query("SELECT * FROM halamanstatis,users WHERE judul_seo='$_GET[judul]'");
  $d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
  $baca = $d[dibaca]+1;
  $tanggalan=explode(' ', $tgl_posting );
  mysql_query("UPDATE halamanstatis SET dibaca='$baca' WHERE judul_seo='$_GET[judul]'");
  
  echo "  <div class='page-container clearfix'>						
  <div class='page-title'>$d[judul]</div>
  
  <div class='post-meta'>
  <div class='author'>Diposting: <a href='#'>$d[nama_lengkap]</a></div>|
  <div class='date'>$d[hari], $tgl_posting - $d[jam] WIB</div>|
  <div class='comments'><a href='#'>Dibaca: $baca pembaca</a></div>

  <div class='addthis_toolbox addthis_default_style'>
  <a class='addthis_button_preferred_1'></a>
  <a class='addthis_button_preferred_2'></a>
  <a class='addthis_button_preferred_3'></a>
  <a class='addthis_button_preferred_4'></a>
  <a class='addthis_button_compact'></a>
  <a class='addthis_counter addthis_bubble_style'></a>
  </div>
  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504c13fd103cdd62'></script>
     
  </div>"; 

  
  if ($d[gambar]!=''){
  echo "
  <div class='post-image'>
  <img src='$aneka_web/img_anekaweb/statis/$d[gambar]' alt='$d[judul]'>
  </div>";}

  echo "				
  <p>$d[isi_halaman]</p>
  </div>
  <div class='line clearfix'></div>";  
  ?>	
  </div>
 
			

  <?php include "$f[folder]/modul/sidebar/sidebar_statis.php";?>