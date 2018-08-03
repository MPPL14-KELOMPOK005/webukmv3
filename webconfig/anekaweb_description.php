<?php
if($_GET[module]=='home'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='detailkategoriberita'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='detailkategorivideo'){
     $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='detailberita'){
     $d = mysql_fetch_array(mysql_query("select isi_berita from berita 
	 WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
	 $isi = (strip_tags($d['isi_berita']));
	 $isi = substr($isi,0,140); 
	 $isi = substr($isi,0,strrpos($isi," "));
echo "$isi";
    }
elseif($_GET[module]=='detailvideo'){
    $d = mysql_fetch_array(mysql_query("select jdl_video from video 
	WHERE video_seo='".anti_injection($_GET['jdl_video'])."'"));
	 $isi = (strip_tags($d['keterangan']));
	 $isi = substr($isi,0,140); 
	 $isi = substr($isi,0,strrpos($isi," "));
echo "$isi";
    }
elseif($_GET[module]=='detailagenda'){
    $d = mysql_fetch_array(mysql_query("select isi_agenda from agenda
	WHERE tema_seo='".anti_injection($_GET['tema'])."'"));
	 $isi = (strip_tags($d['isi_agenda']));
	 $isi = substr($isi,0,140); 
	 $isi = substr($isi,0,strrpos($isi," "));
echo "$isi";
    }
elseif($_GET[module]=='detailfotoberita'){
    $d = mysql_fetch_array(mysql_query("select deskripsi from album
	WHERE album_seo='".anti_injection($_GET['jdl_album'])."'"));
	 $isi = (strip_tags($d['deskripsi']));
	 $isi = substr($isi,0,140); 
	 $isi = substr($isi,0,strrpos($isi," "));
echo "$isi";
    }
elseif($_GET[module]=='halamanstatis'){
    $d = mysql_fetch_array(mysql_query("select isi_halaman from halamanstatis
	WHERE judul_seo='".anti_injection($_GET['judul'])."'"));
	 $isi = (strip_tags($d['isi_halaman']));
	 $isi = substr($isi,0,140); 
	 $isi = substr($isi,0,strrpos($isi," "));
echo "$isi";
    }
elseif($_GET[module]=='detailtag'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='detailtagvideo'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='agenda'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='fotoberita'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='video'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }	
elseif($_GET[module]=='profil'){
    $d = mysql_fetch_array(mysql_query("select isi_profil from profil LIMIT 1"));
	$profil = (strip_tags($d['isi_profil']));
	$profil = substr($profil,0,140); 
	$profil = substr($profil,0,strrpos($profil," "));
echo "$profil";
    }
elseif($_GET[module]=='indeksberita'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='hubungi'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
}
elseif($_GET[module]=='hasilpencarian'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
    }
elseif($_GET[module]=='hubungi'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
}
elseif($_GET[module]=='hubungiaksi'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
}
elseif($_GET[module]=='lihatpoling'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
}
elseif($_GET[module]=='hasilpoling'){
    $n = mysql_fetch_array(mysql_query("select meta_deskripsi from identitas LIMIT 1"));
echo "$n[meta_deskripsi]";
}
?>