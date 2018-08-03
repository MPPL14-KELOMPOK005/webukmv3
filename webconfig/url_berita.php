<?php
  $sq = mysql_query("SELECT * from berita where id_berita='".$val->validasi($_GET['id'],'sql')."'");
  $n = mysql_fetch_array($sq);
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  
	 echo "$iden[url]/berita-$n[id_berita]-$n[judul_seo].html";?>
		

