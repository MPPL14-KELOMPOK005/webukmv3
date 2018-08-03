<div id="content" class="clearfix">
 
        <div id="content" class="clearfix">
        


<div class="posts-container clearfix">
<div class="page-title">UKM</div>
<div class="carousel">
<ul class="slides">
<?php				
  $ukm=mysql_query("SELECT * FROM ukm ORDER BY id_ukm DESC LIMIT 8");
  while($w=mysql_fetch_array($ukm)){
  $tgl = tgl_indo($w['tgl_posting']); 
  if ($w['gambar']!=''){  
  echo "
  <li>
<a href='$aneka_web/ukm/".date('Y/m/d',strtotime($w['tgl_posting']))."/$w[id_ukm]/$w[tema_seo]'>
<img src='$aneka_web/img_anekaweb/ukm/small_$w[gambar]' alt='$$w[tema]'>
</a>
<a href='$aneka_web/ukm/".date('Y/m/d',strtotime($w['tgl_posting']))."/$w[id_ukm]/$w[tema_seo]'>
<h2>$w[tema]</h2>
</a>
</li>
";}} ?>
</ul>
</div>
</div>

		</div>



</div>
<?php include "$f[folder]/modul/sidebar/sidebar_home.php";?>