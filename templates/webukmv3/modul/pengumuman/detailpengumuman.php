  
  <div id='content' class='clearfix'>
  <?php		
  $detail=mysql_query("SELECT * FROM pengumuman,users   
								  WHERE users.username=pengumuman.username 
								  AND pengumuman.tema_seo='".anti_injection($_GET['tema'])."'");
	          $d   = mysql_fetch_array($detail);
              $tgl = tgl_indo($d[tgl_posting]);
              $baca = $d[dibaca]+1;
            
              mysql_query("UPDATE pengumuman SET dibaca=$d[dibaca]+1 
              WHERE tema_seo='".anti_injection($_GET['tema'])."'");

  echo "	
  <div class='page-container clearfix'>
  <div class='page-title'>$d[tema]</div>

  <div class='post-meta'>
  <div class='author'>Diposting: <a href='#'>$d[nama_lengkap]</a></div>|
  <div class='date'>$tgl</div>|
  <div class='comments'><a href='#'>Dibaca: $baca pembaca</a></div>

  
	<div class='addthis_social'>
	<div class='addthis_toolbox addthis_default_style'>
	<a class='addthis_button_preferred_1'></a>
	<a class='addthis_button_preferred_2'></a>
	<a class='addthis_button_preferred_3'></a>
	<a class='addthis_button_preferred_4'></a>
	<a class='addthis_button_compact'></a>
	<a class='addthis_counter addthis_bubble_style'></a>
	</div>
	</div>
	<script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-5023457e217d0113'></script>"; 
 
 
  if ($d[gambar]!=''){
  echo "
  <div class='post-image'>
  <img src='$aneka_web/img_anekaweb/pengumuman/$d[gambar]'>
  </div>
  <br/>";}

  echo "				
  <p>$d[isi_pengumuman]</p>
  <div class='line clearfix'></div>";  


  
  echo "<div class='post-navigation'> ";
  
        $id = $d['id_pengumuman'] - 1;
        $prev = mysql_query("SELECT * FROM pengumuman where id_pengumuman='$id'");
        $p = mysql_fetch_array($prev);
        $anekaweb = mysql_num_rows($prev);
  
        if ($anekaweb >= 1){
  echo "<div class='post-previous'>
        <a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($p['tgl_posting']))."/$p[id_pengumuman]/$p[tema_seo]' rel='prev'>
        <span>Sebelumnya:</span> $p[tema]</a></div>";
	     }else{
  echo "<div class='post-previous'><a href='#' rel='prev'>
        <span>Sebelumnya:</span> Tidak ditemukan Pengumuman Sebelumnya!!!</a></div>";
	    }
   
        $idd = $d['id_pengumuman'] + 1;
        $prevd = mysql_query("SELECT * FROM pengumuman where id_pengumuman='$idd'");
        $pd = mysql_fetch_array($prevd);
        $anekaweb1 = mysql_num_rows($prevd);
  
        if ($anekaweb1 >= 1){
  echo "<div class='post-next'>
        <a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($pd['tgl_posting']))."/$pd[id_pengumuman]/$pd[tema_seo]' rel='next'>
        <span>Selanjutnya:</span> $pd[tema]</a></div>";
         }else{
  echo "<div class='post-next'><a href='#' rel='next'>
        <span>Selanjutnya:</span> Tidak ditemukan Pengumuman Selanjutnya!!!</a></div>";
		}
  
  echo "</div>";  
  

  echo "<div id='reply' class='clearfix'>
        <h4>Komentar</h4>
        <div class='contact-form'>
        <div class='fb-comments' data-href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($d['tgl_posting']))."/$d[id_pengumuman]/$d[tema_seo]' data-num-posts='20' data-width='100%'></div>
	    </div> 
	    </div>
		  
	    </div>
		  
	    </div>";
	    ?>

        </div>

<?php include "$f[folder]/modul/sidebar/sidebar_home.php";?>