<div id='content' class='clearfix'>
	<div class='page-title'>
		PENGUMUMAN
	</div>
	<br/><br/>
	<?php
    $p      = new Paging6;
    $batas  = 6;
    $posisi = $p->
	cariPosisi($batas); 
	
	// Tampilkan daftar berita video sesuai dengan video yang dipilih 
	  $AWpengumuman=mysql_query("SELECT * FROM pengumuman,users WHERE users.username=pengumuman.username
									  ORDER BY id_pengumuman DESC LIMIT $posisi,$batas");
	  while($r=mysql_fetch_array($AWpengumuman)){
	  $tgl = tgl_indo($r['tgl_posting']); 
	  $baca = $r[dibaca]+0;
	  
	  $isi_pengumuman =(strip_tags($r[isi_pengumuman])); 
	  $isi = substr($isi_pengumuman,0,200); 
	  $isi = substr($isi_pengumuman,0,strrpos($isi," "));
	
	if ($r['gambar']!=''){ 
	
	echo "
	<div class='post-container clearfix'>
		<a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_pengumuman]/$r[tema_seo]'><img src='$aneka_web/img_anekaweb/pengumuman/$r[gambar]'/></a>
		<article class='post-content'>
		<h1 class='post-title'><a href='$aneka_web/pengumuman/".date('Y/m/d',strtotime($r['tgl_posting']))."/$r[id_pengumuman]/$r[tema_seo]'>$r[tema]</a></h1>
		<div class='post-meta'>
			<div class='date'>$tgl | dibaca $baca pembaca</div>
		</div>
		<br/>";} 
		
		echo "
		<p>
			$isi ..
		</p>
		</article>
	</div>
	";} 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pengumuman")); 
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas); 
	$linkHalaman = $p->navHalaman($_GET[halpengumuman], $jmlhalaman); 
	
	echo "
	<div class='pagenation clearfix'>
		<ul>
			$linkHalaman
		</ul>
	</div>
	<br/>"; ?>
</div>

<?php include "$f[folder]/modul/sidebar/sidebar_statis.php";?>