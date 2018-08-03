<div id="content" class="clearfix">
	<div class='page-title'>
		HASIL PENCARIAN
	</div>
	<br/><br/>
	<?php
   $kata = trim($_POST['kata']);
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  $cari = "SELECT * FROM berita WHERE " ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; } }
  $cari .= " ORDER BY id_berita DESC LIMIT 5";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);
  if ($ketemu > 0){
	
	echo "<h5 class='post-title'>&nbsp;Ditemukan 
		  <span class style=\"color:#00498E;\">$ketemu berita </span>dengan kata <font style='background-color:'>
		  <class style=\"color:#00498E;\">$kata</font></h5>";
		   while($r=mysql_fetch_array($hasil)){
		   $tgl = tgl_indo($r['tanggal']);
		   $baca = $r[dibaca]+0;
		   
		   $isi_berita =(strip_tags($r[isi_berita])); 
		   $isi = substr($isi_berita,0,215); 
		   $isi = substr($isi_berita,0,strrpos($isi," "));
		  
		   $judul = strip_tags($r['judul']); 
		   $judul = substr($judul,0,35); 
		   $judul = substr($judul,0,strrpos($judul," ")); 
	
	if ($r['gambar']!=''){ 
	
	echo "
	<div class='post-container clearfix'>
		<a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'><img src='$aneka_web/img_anekaweb/berita/$r[gambar]'/></a>
		<article class='post-content'>
		<h1 class='post-title'><a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'>$r[judul]</a></h1>
		<div class='post-meta'>
			<div class='date'>
				$r[hari], $tgl, $r[jam] WIB
			</div>
		</div>
		<br/>";
		
		echo "<p>$isi ..</p>
		</article>
	</div>";} } } 
	 ?>
</div>

<?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>