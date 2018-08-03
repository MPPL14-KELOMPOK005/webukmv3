<?php
if($_GET[module]=='home'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$n[meta_keyword]";
    }
elseif($_GET[module]=='detailkategoriberita'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$n[meta_keyword]";
    }
elseif($_GET[module]=='detailkategorivideo'){
     $d = mysql_fetch_array(mysql_query("select nama_kategorivideo from kategorivideo 
	 WHERE kategorivideo_seo='".anti_injection($_GET['vid'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "video $d[nama_kategorivideo], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailberita'){
    $d = mysql_fetch_array(mysql_query("select judul from berita 
	WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$d[judul], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailvideo'){
    $d = mysql_fetch_array(mysql_query("select jdl_video from video 
	WHERE video_seo='".anti_injection($_GET['jdl_video'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$d[jdl_video], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailagenda'){
    $d = mysql_fetch_array(mysql_query("select tema from agenda
	WHERE tema_seo='".anti_injection($_GET['tema'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$d[tema], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailfotoberita'){
    $d = mysql_fetch_array(mysql_query("select jdl_album from album
	WHERE album_seo='".anti_injection($_GET['jdl_album'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$d[jdl_album], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailtag'){
    $d = mysql_fetch_array(mysql_query("select nama_tag from tag
	WHERE tag_seo='".anti_injection($_GET['idtag'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "tag $d[nama_tag], $n[meta_keyword]";
    }
elseif($_GET[module]=='detailtagvideo'){
    $d = mysql_fetch_array(mysql_query("select nama_tag from tagvideo
	WHERE tag_seo='".anti_injection($_GET['idtagvideo'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "tag video $d[nama_tag], $n[meta_keyword]";
    }
elseif($_GET[module]=='halamanstatis'){
    $d = mysql_fetch_array(mysql_query("select judul from halamanstatis
	WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "$d[judul], $n[meta_keyword]";
    }
elseif($_GET[module]=='agenda'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "agenda, $n[meta_keyword]";
    }
elseif($_GET[module]=='fotoberita'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "foto berita, $n[meta_keyword]";
    }
elseif($_GET[module]=='video'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "video berita, $n[meta_keyword]";
    }	
elseif($_GET[module]=='profil'){
    $n = mysql_fetch_array(mysql_query("select * from identitas LIMIT 1"));
echo "Profil $n[nama_website] - $n[meta_keyword]";
    }
elseif($_GET[module]=='indeksberita'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "Indeks Berita, $n[meta_keyword]";
    }
elseif($_GET[module]=='hubungi'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "Kontak | $n[meta_keyword]";
}
elseif($_GET[module]=='hasilpencarian'){
    $n = mysql_fetch_array(mysql_query("select meta_keyword from identitas LIMIT 1"));
echo "hasil pencarian, $n[meta_keyword]";
    }
elseif($_GET[module]=='hubungi'){
    $n = mysql_fetch_array(mysql_query("select * from identitas LIMIT 1"));
echo "Kontak $n[nama_website] - $n[meta_keyword]";
}
elseif($_GET[module]=='hubungiaksi'){
    $n = mysql_fetch_array(mysql_query("select * from identitas LIMIT 1"));
echo "Kontak $n[nama_website] | $n[meta_keyword]";
}
elseif($_GET[module]=='lihatpoling'){
    $n = mysql_fetch_array(mysql_query("select * from identitas LIMIT 1"));
echo "Poling $n[nama_website] - $n[meta_keyword]";
}
elseif($_GET[module]=='hasilpoling'){
    $n = mysql_fetch_array(mysql_query("select * from identitas LIMIT 1"));
echo "Poling $n[nama_website] - $n[meta_keyword]";
}
?>