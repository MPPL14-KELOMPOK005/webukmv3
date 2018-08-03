			
  <div id='content' class='clearfix'>
  <?php
  $sq = mysql_query("SELECT * from kategoriberita where kategori_seo='".anti_injection($_GET['cat'])."'");
  $n = mysql_fetch_array($sq);
  
  echo " 
  <div class='page-title'>$n[nama_kategori]</div><br/><br/>";
    
  $p      = new Paging3;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih	 
  $sql2   = "SELECT * FROM berita,users,kategoriberita WHERE users.username=berita.username 
					  AND berita.id_kategori=kategoriberita.id_kategori 
					  AND kategoriberita.kategori_seo='$n[kategori_seo]' 
					  ORDER BY berita.id_berita DESC LIMIT $posisi,$batas";	
   
  $hasil = mysql_query($sql);
  $hasil = mysql_query($sql2);
  $jumlah = mysql_num_rows($hasil);
  // Apabila ditemukan berita dalam kategori
  if ($jumlah > 0){
  while($r=mysql_fetch_array($hasil)){
  
  $tgl = tgl_indo($r[tanggal]);
  $baca = $r[dibaca]+0;
  
  $isi_berita =(strip_tags($r[isi_berita])); 
  $isi = substr($isi_berita,0,280); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
  
			
  if ($r['gambar']!=''){

  echo " 
  <div class='post-container clearfix'>
  <a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'><img src='$aneka_web/img_anekaweb/berita/small_$r[gambar]'/></a>
  <article class='post-content'>
  <h1 class='post-title'><a href='$aneka_web/berita/".date('Y/m/d',strtotime($r['tanggal']))."/$r[id_berita]/$r[judul_seo]'>$r[judul]</a></h1>
  <div class='post-meta2'>
  <div class='date'>$r[hari], $tgl, $r[jam] WIB</div>
  </div>";}
  
  echo "	
  <p>$isi ..</p>
  </article>


  </div>";}
			
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita,kategoriberita 
			   WHERE berita.id_kategori=kategoriberita.id_kategori 
			   AND kategoriberita.kategori_seo='".anti_injection($_GET['cat'])."'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategoriberita], $jmlhalaman);

  echo " 
  <div class='pagenation clearfix'>
  <ul>$linkHalaman</ul>
  </div><br/>";} 
  					
  else{
  echo " 
  <h4 class style=\"font-size:14px;font-weight: bold;\">Belum ada Berita pada kategori <span class style=\"color:#00437A;\">$n[nama_kategori].</span></h4>";}  
  ?>
  </div>     
  
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>