<?php
if (isset($_GET['id'])){
    $sql = mysql_query("SELECT * from berita where judul_seo='".anti_injection($_GET['judul'])."'");
    $j   = mysql_fetch_array($sql);
    

		echo "$aneka_web/img_anekaweb/berita/$j[gambar]";
}
else{
		echo "$aneka_web/img_anekaweb/logo/logo.png";
}
?>

