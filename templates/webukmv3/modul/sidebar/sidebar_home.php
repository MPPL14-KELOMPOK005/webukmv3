 <aside id="sidebar" class="clearfix">
  <ul>
  <?php include "akun.php";?>
  
		
  <li class="widget tabs-widget">

  <div id="popular-tab">
  <div class="page-title2">PENGUMUMAN</div>
  
  <ul>
  <?php    
   $info=mysql_query("SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 5");
  while($p=mysql_fetch_array($info)){
  $tgl = tgl_indo($p['tgl_posting']);
  $baca = $p[dibaca]+0; 
  if ($p['gambar']!=''){
  
  echo "
  <li>
  <a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($p['tgl_posting']))."/$p[id_pengumuman]/$p[tema_seo]'>
  <img alt='$p[tema]' src='$aneka_web/img_anekaweb/pengumuman/small_$p[gambar]'></a>";}
  
  echo "
  <h3><a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($p['tgl_posting']))."/$p[id_pengumuman]/$p[tema_seo]'><b>$p[tema]</b></a></h3>
  <div class='post-meta'>
	<div class='date'>$tgl | dibaca $baca pembaca
	</div>
</div>
  </li> ";}
  ?>
  </ul>
  
  </div>

  </li>
  
  
   
 
  
 
  
  
  
  
  
  
  
  
 
  
  </aside>
  