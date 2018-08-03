<?php 
error_reporting(0);
session_start();
$iden=mysql_fetch_array(mysql_query("SELECT url FROM identitas"));
$aneka_web="$iden[url]";
$tip=$_SESSION['ip'];
$tjam=$_SESSION['jam'];
$ttgl=$_SESSION['tgl'];
if($tip=='' && $tjam=='' && $ttgl==''){				
$ip=$_SERVER['REMOTE_ADDR'];
$jam=date("h:i:s");
$tgl=date("d-m-Y");
$_SESSION ["ip"] = $ip;
$_SESSION ["jam"] = $jam;
$_SESSION ["tgl"] = $tgl;
}
$sip=$_SESSION['ip'];
$sjam=$_SESSION['jam'];
$stgl=$_SESSION['tgl'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include "webconfig/anekaweb_titel.php"; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include " webconfig/anekaweb_description.php"; ?>
">
<meta name="keywords" content="<?php include " webconfig/anekaweb_keywords.php"; ?>
">
<meta http-equiv="Copyright" content="AnekaWeb" "anekaweb.com">
<meta name="author" content="AnekaWeb" "https://anekaweb.com">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php 
   $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  echo "<link rel='shortcut icon' href='$aneka_web/img_anekaweb/logo/$iden[favicon]' />
"; ?> 
<!--========= BAGIAN CSS ========================-->
<link rel="stylesheet" href="<?php echo "$aneka_web/$f[folder]/css/style.css" ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo "$aneka_web/$f[folder]/css/responsive.css" ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo "$aneka_web/$f[folder]/css/dzstooltip.css" ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo "$aneka_web/$f[folder]/css/jquery.ad-gallery.css" ?>" type="text/css" />

 <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
  
  
<!-- Script Facebook -->
<div id="fb-root">
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<!-- Akhir Script Facebook -->
<!-- Script Copyright -->
<script type="text/javascript">
   if(document.location.protocol=='http:'){
   var Tynt=Tynt||[];Tynt.push('accswOR5Kr4yaUacwqm_6r');Tynt.i={"ap":"<br/><b>Sumber: <?php include "webconfig/url_web.php";?></b><hr>"};
   (function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js'; 
   var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
   }
   </script>
<!-- Akhir Script Copyright -->
  
</head>

<body class="left-sidebar">
<div id="container">
        
	<header class="clearfix">
	<div id="logo">
		<?php
  $logo=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC LIMIT 1");
  while($b=mysql_fetch_array($logo)){
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  echo "<a href='$iden[url]'>
		<img src='$aneka_web/img_anekaweb/logo/$b[gambar]'/></a>";} ?>
	</div>
    
	<div id="search-bar">
		 <form action="<?php echo "$aneka_web/"; ?>hasil-pencarian.html" method="post">
        <input class="sb-search-input" placeholder="Pencarian..." type="text" value="" name="kata" id="search">
        <input class="sb-search-submit" type="submit" value="">
        <span class="sb-icon-search"></span>
    </form>
	</div>
    
    
	<nav class="navigation clearfix">
	<ul class="sf-menu">
		<?php  
			   $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY urutan");
			   while($r=mysql_fetch_array($main)){
			   $jml=mysql_num_rows($main);
			   if ($jml >
		 0){ echo "
		<li><a href='$aneka_web/$r[link]'>$r[nama_menu]</a>"; $sub=mysql_query("SELECT * FROM submenu, mainmenu WHERE submenu.id_main=mainmenu.id_main AND submenu.id_main=$r[id_main]"); $jml=mysql_num_rows($sub); if ($jml > 0){ echo "
		<ul>
			"; while($w=mysql_fetch_array($sub)){ echo "
			<li><a href='$aneka_web/$w[link_sub]'>$w[nama_sub]</a></li>
			";} echo "
		</ul>
		"; } else{ echo "</li>
		"; } } } ?>
	</ul>
	</nav>
    
    
	<div id="sub-menu" class="clearfix">
        
        
		</header>

<?php include "konten.php";?>
<?php include "$f[folder]/modul/footer/footer.php";?>

</div>

<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jsliderelatedpages.js" ?>" type="text/javascript"></script>
<script type="text/javascript">  
  $().ready(function() {  
  $('#jsrp_related').jsliderelatedposts({
  speed: 1000,  
  scrolltrigger: 0.50,
  smartwidth: true
  });});  
  </script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.ad-gallery.pack.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.ad-gallery.js.js?rand=700" ?>" type="text/javascript"></script>
<script type="text/javascript">
  $(function() {
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
  });
  </script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.flexslider.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.superfish.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.selectbox.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.masonry.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.fancybox.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/jquery.jcarousel.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/script.js" ?>" type="text/javascript"></script>
<script src="<?php echo " $aneka_web/$f[folder]/js/text-scroller.js" ?>" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($){
  $('#tr1').dzscalendar({
  start_month: ' <?=date("m")?>' 
  ,start_year: '<?=date("Y")?>'
  });
  })
  </script>
</body>
</html>
<!--========= Copyright © 2014. Depeloved by: TerasKreasi | RizalFaizal  ========================-->