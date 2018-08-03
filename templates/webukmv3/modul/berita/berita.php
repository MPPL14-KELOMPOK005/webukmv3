<div id="content" class="clearfix">
	<div class='page-title'>BERITA</div>
	<br/><br/>
	<?php
  $p      = new Paging7;
  $batas  = 6;
  $posisi = $p->
	cariPosisi($batas); 
	
	// Tampilkan daftar berita video sesuai dengan video yang dipilih 
	
	$AWberita=mysql_query("SELECT * FROM berita,users WHERE users.username=berita.username 
	                                ORDER BY id_berita DESC LIMIT $posisi,$batas"); 
	while($r=mysql_fetch_array($AWberita)){ 
	$tgl = tgl_indo($r['tanggal']); 
	$baca = $r[dibaca]+0; 
	$isi_berita =(strip_tags($r[isi_berita])); 
	$isi = substr($isi_berita,0,200); 
	$isi = substr($isi_berita,0,strrpos($isi," ")); 
	
	if ($r['gambar']!=''){ 
	
	echo "
	<div class='post-container clearfix'>
		<a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'><img src='$aneka_web/img_anekaweb/berita/$r[gambar]'/></a>
		<article class='post-content'>
		<h1 class='post-title'><a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'>$r[judul]</a></h1>
		<div class='post-meta'>
			<div class='date'>
				$r[hari], $tgl, $r[jam] WIB | dibaca $baca pembaca
			</div>
		</div>
		<br/>";} 
		
		echo "
		<p>
			$isi ..
		</p>
		</article>
	</div>
	";} 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita")); 
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas); 
	$linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman); 
	
	echo "
	<div class='pagenation clearfix'>
		<ul>
			$linkHalaman
		</ul>
	</div>
	<br/>"; ?>
</div>

<?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>