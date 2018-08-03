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
  
  
  <li class="widget widget_video">
  <div class="page-title2">VIDEO KEGIATAN</div>
  <?php    
    $video=mysql_query("SELECT * FROM video ORDER BY id_video DESC LIMIT 1");
	  while ($r   = mysql_fetch_array($video)){
	  $tgl = tgl_indo($r[tanggal]);
	  $lihat = $r[dilihat]+0;
	  
	  $keterangan = (strip_tags($r['keterangan']));
	  $keterangan = substr($keterangan,0,120); 
	  $keterangan = substr($keterangan,0,strrpos($keterangan," "));
  
  
  echo "<iframe width='100%' height='200' src='$r[youtube]' frameborder='0' allowfullscreen></iframe><br/>
		<b>$r[jdl_video]</b>
		<p>$keterangan.</p>";}
  ?>						
  </li>
  
  
  <li class="widget widget_archive">
  <div class="page-title2">KATEGORI BERITA</div>
  <ul>
  <?php
	$kategori=mysql_query("select nama_kategori, kategoriberita.id_kategori, kategori_seo,  
	count(berita.id_kategori) as jml 
	from kategoriberita left join berita 
	on berita.id_kategori=kategoriberita.id_kategori 
	group by nama_kategori");
	
	while($k=mysql_fetch_array($kategori)){
	$nama_kategori=strtoupper($k[nama_kategori]);
	$id=$k[id_kategori];
   echo "
   <li>
   <a href='$aneka_web/kategoriberita/$k[kategori_seo]'>$k[nama_kategori] 
   <span class='jumblog'>($k[jml])</span></a>
   </li>";}
   ?>
   </ul>
   </li>
   
   
  <li class="widget widget_archive">
  <div class="page-title2">DOWNLOAD AREA</div>
  <ul>
  <?php
  
  $down=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT 5");
  while($d=mysql_fetch_array($down)){
  
  echo "
  <li>
  <a href='$aneka_web/webconfig/download.php?file=$d[nama_file]'>$d[judul]</a>
  </li>";}
  ?>
  </ul>
  </li>
  
  
  <li class="widget widget_social_media">
  <div class="page-title2">LINK TERKAIT</div>
  <ul>
  
  <?php
  $banner=mysql_query("SELECT * FROM link ORDER BY id_link DESC LIMIT 4");
  while($b=mysql_fetch_array($banner)){
  echo "
  <li>
  <a href='$b[link]' target='_blank' title='$b[judul]'>
  <img src='$aneka_web/img_anekaweb/link/$b[gambar]'></a>
  </li>";}
  ?>
  </ul>
  </li>
  
  
  
  <li class="widget widget_social_media">
  <div class="page-title2">POLLING</div>
  <?php
  $tanya=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
  $t=mysql_fetch_array($tanya);
  echo "<div class='poling'><class style=\"color:#333;font-size:12px;font-weight:400\"><b>$t[pilihan]</b></div>"; 
  
  echo "<form method=POST action='$aneka_web/hasil-poling.html'>"; 
		$poling=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'"); while ($p=mysql_fetch_array($poling)){ echo "<br/>
		<div class='marginpoling'>
			<input type=checkbox name=pilihan value='$p[id_poling]'/>
			<class style=\"color:#333;font-size:12px;font-weight:400\"> &nbsp;<b>$p[pilihan]</b>
		</div>
		";} echo "<br/>
		<div>
			<input type=submit value='PILIH' class='button-blue'/>
		</form>
		<a href=$aneka_web/lihat-poling.html><input type=button value='LIHAT HASIL' class='button-gray'></a>
	</div>
	"; ?>
  </li>
  
  
  
  
  </aside>
  