 <?php
if($_GET[module]=='detailkategoriberita'){
     $d = mysql_fetch_array(mysql_query("select nama_kategori from kategoriberita WHERE kategori_seo='".anti_injection($_GET['cat'])."'"));
     $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Kategori Berita - $d[nama_kategori]";
    }
elseif($_GET[module]=='detailkategorivideo'){
     $d = mysql_fetch_array(mysql_query("select nama_kategorivideo from kategorivideo WHERE kategorivideo_seo='".anti_injection($_GET['vid'])."'"));
     $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Kategori Video - $d[nama_kategorivideo]";
    }
elseif($_GET[module]=='detailagenda'){
    $d = mysql_fetch_array(mysql_query("select tema from agenda WHERE tema_seo='".anti_injection($_GET['tema'])."'"));
echo "$d[tema]";
    }
elseif($_GET[module]=='halamanstatis'){
    $d = mysql_fetch_array(mysql_query("select judul from halamanstatis WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "$n[nama_website] - $d[judul]";
    }
elseif($_GET[module]=='detailberita'){
    $d = mysql_fetch_array(mysql_query("select judul from berita WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
echo "$d[judul]";
    }
elseif($_GET[module]=='detailvideo'){
    $d = mysql_fetch_array(mysql_query("select jdl_video from video WHERE video_seo='".anti_injection($_GET['jdl_video'])."'"));
echo "$d[jdl_video]";
    }
elseif($_GET[module]=='detailtag'){
    $d = mysql_fetch_array(mysql_query("select nama_tag from tag WHERE tag_seo='".anti_injection($_GET['idtag'])."'"));
echo "Tag Berita $d[nama_tag]";
    }
elseif($_GET[module]=='detailtagvideo'){
    $d = mysql_fetch_array(mysql_query("select nama_tag from tagvideo WHERE tag_seo='".anti_injection($_GET['idtagvideo'])."'"));
echo "Tag Video $d[nama_tag]";
    }
elseif($_GET[module]=='detailfotoberita'){
    $d = mysql_fetch_array(mysql_query("select jdl_album from album WHERE album_seo='".anti_injection($_GET['jdl_album'])."'"));
echo "$d[jdl_album]";
    }
elseif($_GET[module]=='profil'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Profil $n[nama_website]";
    }
elseif($_GET[module]=='agenda'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Agenda - $n[nama_website]";
    }
elseif($_GET[module]=='fotoberita'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Foto Berita - $n[nama_website]";
    }
elseif($_GET[module]=='indeksberita'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Indeks Berita - $n[nama_website]";
    }
elseif($_GET[module]=='video'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Video Berita - $n[nama_website]";
    }
elseif($_GET[module]=='hubungi'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Hubungi - $n[nama_website]";
}
elseif($_GET[module]=='hubungiaksi'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Hubungi - $n[nama_website]";
}
elseif($_GET[module]=='lihatpoling'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Lihat Poling - $n[nama_website]";
}
elseif($_GET[module]=='hasilpoling'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Hasil Poling - $n[nama_website]";
}
elseif($_GET[module]=='hasilpencarian'){
    $n = mysql_fetch_array(mysql_query("select nama_website from identitas LIMIT 1"));
echo "Hasil Pencarian Berita - $n[nama_website]";
}
else{
      $sql2 = mysql_query("select * from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
  echo "$j2[nama_website] | $j2[titel] ";
}
?>