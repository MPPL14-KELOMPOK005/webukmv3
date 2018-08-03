<?php
if($_GET['module']=='home'){
	echo "<span class='crumb'>Beranda</span>";
}
elseif($_GET['module']=='nasional'){
	echo "<span class='crumb'>Berita Nasional</span>";
}
elseif($_GET['module']=='fotoberita'){
	echo "<span class='crumb'>Foto Berita</span>";
}
elseif($_GET['module']=='agenda'){
	echo "<span class='crumb'>Agenda Jakarta</span>";
}
elseif($_GET['module']=='video'){
	echo "<span class='crumb'>Video Berita</span>";
}
elseif($_GET['module']=='hasilpencarian'){
	echo "<span class='crumb'>Hasil Pencarian</span>";
}
elseif($_GET['module']=='fotoberita'){
	echo "<span class='crumb'>Foto Berita</span>";
}
elseif($_GET['module']=='halamanstatis'){
	echo "<span class='crumb'>Halaman Statis</span>";
}
elseif($_GET['module']=='lihatpoling'){
	echo "<span class='crumb'>Poling</span>";
}
elseif($_GET['module']=='hasilpoling'){
	echo "<span class='crumb'>Hasil Poling</span>";
}
elseif($_GET['module']=='hubungi'){
	echo "<span class='crumb'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hubungiaksi'){
	echo "<span class='crumb'>Hubungi Kami</span>";
}
elseif($_GET['module']=='detailberita'){
	$detail	=mysql_query("SELECT * FROM berita,kategoriberita    
                      WHERE kategoriberita.id_kategori=berita.id_kategori 
                      AND berita.judul_seo='$_GET[judul]'");
	$d		= mysql_fetch_array($detail);
	echo "<a href='store' class='parent'>Beranda</a>
	<span class='separator'>&raquo;</span>
	<a href='kategoriberita/$d[kategori_seo]' class='child'>$d[nama_kategori]</a>
	<span class='separator'>&raquo;</span>
	<a href='' class='child'>$d[judul]</a>";
}
elseif($_GET['module']=='detailkategoriberita'){
	$detail	=mysql_query("SELECT nama_kategori from kategoriberita
	                      where kategoriberita.kategori_seo='$_GET[cat]'");
	$d		= mysql_fetch_array($detail);
	echo "<a href='store' class='parent'>Beranda</a>
	<span class='separator'>&raquo;</span>
	<a href='' class='child'>$d[nama_kategori]</a>";
}
elseif($_GET['module']=='detailagenda'){
	$detail	=mysql_query("SELECT tema from agenda where agenda.tema_seo='$_GET[tema]'");
	$d		= mysql_fetch_array($detail);
	echo "<a href='store' class='parent'>Beranda</a>
	<span class='separator'>&raquo;</span>
	<a href='' class='child'>$d[tema]</a>";
}
elseif($_GET['module']=='detailfotoberita'){
	$detail	=mysql_query("SELECT jdl_album from album where album.album_seo='$_GET[album]'");
	$d		= mysql_fetch_array($detail);
	echo "<a href='store' class='parent'>Beranda</a>
	<span class='separator'>&raquo;</span>
	<a href='' class='child'>$d[jdl_album]</a>";
}
?>
