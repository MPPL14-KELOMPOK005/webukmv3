<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
$r=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));

$iden=mysql_fetch_array(mysql_query("SELECT url FROM identitas"));

//fungsi cek akses user
function user_akses($mod,$id){
	$link = "?module=".$mod;
	$cek = mysql_num_rows(mysql_query("SELECT * FROM modul,users_modul 
	                                   WHERE modul.id_modul=users_modul.id_modul 
									   AND users_modul.id_session='$id' 
									   AND modul.link='$link'"));
	return $cek;
}
//fungsi cek akses menu
function umenu_akses($link,$id){
	$cek = mysql_num_rows(mysql_query("SELECT * FROM modul,users_modul 
	                                   WHERE modul.id_modul=users_modul.id_modul 
									   AND users_modul.id_session='$id' 
									   AND modul.link='$link'"));
	return $cek;
}
//fungsi redirect
function akses_salah(){
	$pesan = "<link href='css/style.default.css' rel='stylesheet' type='text/css'>
	  <body class='special-page'>
	  <div id='container'>
	  <section id='error-number'>
	  
	  <center><div class='gambar'><img src='img/lock.png'></div></center>
	  <h1>AKSES ILEGAL</h1>
	  
	  <p class='peringatan'>
	  Maaf, untuk masuk Halaman Administrator
	  anda harus Login dahulu!</p><br/>
	  
	  </section>
	  
	  <section id='error-text'>
	  <p><a class='btn btn-primary' href='index.php'> <b>LOGIN DI SINI</b></a></p>
	  </section>
	  </div>";
	  return $pesan;
}

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

echo "<link href='css/style.default.css' rel='stylesheet' type='text/css'>
	  <body class='special-page'>
	  <div id='container'>
	  <section id='error-number'>
	  
	  <center><div class='gambar'><img src='img/lock.png'></div></center>
	  <h1>AKSES ILEGAL</h1>
	  
	  <p class='peringatan'>
	  Maaf, untuk masuk Halaman Administrator
	  anda harus Login dahulu!</p><br/>
	  
	  </section>
	  
	  <section id='error-text'>
	  <p><a class='btn btn-primary' href='index.php'> <b>LOGIN DI SINI</b></a></p>
	  </section>
	  </div>";}
  
  else{
  
  ?>

  <!DOCTYPE html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>.:: ADMINISTRATOR ::.</title>
  <link rel="shortcut icon" href="../favicon.png" />
  
  
  <link rel="stylesheet" href="css/style.default.css" type="text/css" />
  <link rel="stylesheet" href="css/grafik.css" type="text/css" />
  <link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
  
  <script type="text/javascript" src="prettify/prettify.js"></script>
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  
  <script type="text/javascript" src="js/charCount.js"></script>
  <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script type="text/javascript" src="js/forms.js"></script>
  
    
  <!--  Grapik Statistik -->
  <script type="text/javascript" src="js/charts/jquery.cookies.2.2.0.min.js"></script>
  <script type="text/javascript" src="js/charts/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="js/charts/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="js/charts/charts.js"></script>

  
  <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  
 </head>
  <body>

  <div class="mainwrapper">
 
  <div class="leftpanel">
    	
  <div class="logopanel">
  <h1><a href="#">Administrator</span></a></h1>
  </div><!--logopanel-->
        
  <div class="datewidget"><script type="text/javascript" src="js/almanak.js"></script> - <span id="time">
</span> WIB</div>
    
	
  <div class="plainwidget">
  <div class="user_box round_all clearfix">
  <a href="media.php?module=user&act=edituser&id=<?php echo $r['id_session'];?>"><?php include "foto.php"; ?></a>
			
  <div class="selamat"><SCRIPT language=JavaScript>var d = new Date();
  var h = d.getHours();
  if (h < 11) { document.write('Selamat pagi,'); }
  else { if (h < 15) { document.write('Selamat siang,'); }
  else { if (h < 19) { document.write('Selamat sore,'); }
  else { if (h <= 23) { document.write('Selamat malam,'); }
  }}}</SCRIPT></div>
  
  
  <div class="nama_user"><a href="media.php?module=user&act=edituser&id=<?php echo $r['id_session'];?>">
  <?php include "nama.php"; ?></a><br/>
  </div>
  <a href="media.php?module=user&act=edituser&id=<?php echo $r['id_session'];?>">
  <span class='icon-user'></span> Edit Profil</a>
  </div>
  </div>
		
  <!--================= AKHIR MENU ========================-->
  <div class="leftmenu">        
  <ul class="nav nav-tabs nav-stacked">
  
  <li class="dropdown"><a href="#"><span class="iconsweets-home"></span><?php include "menu1.php"; ?></a></li>
			
  
  
  </ul>
  </div>
  <!--================= AKHIR MENU ========================-->
  
		
  </div>
    
	
	

  <div class="rightpanel">
	
	
  <div class="headerpanel">
  <a target='_blank' href=../index.php  class="showmenu"></a>
  <div class="headerright">
  
  
  <div class="dropdown notification">
  <a class="dropdown-toggle"  href="logout.php" tittle="keluar">
  <span class="iconsweets-outgoing iconsweets-white"></span>
  </a>
  </div>
  
   <div class="dropdown notification">
  <?php include "lihatweb.php"; ?>
  </div>
                
				

  </div>
  </div>

    <div class="breadcrumbwidget">
    <ul class="breadcrumb">
    <li><a href="?module=home">Home</a> <span class="divider">/</span></li>
    <li class="active"><?php include "breadcrumb.php"; ?></li>
    </ul>
    </div><!--breadcrumbs-->


  <?php include "content.php"; ?>

                
  <div class="divider15"></div>
  </div></div></div>
	
  <div class="clearfix"></div>
    
  <div class="footer">
  <div class="footerleft">Copyright <?=date("Y")?> - <?php include "nama_web.php"; ?></div>
  <div class="footerright">Developed by:<a href="http://anekaweb.com"><?php include "nama_pemilik.php";?></a></div>
  </div>
    
  </div>
  
<script type="text/javascript">
jQuery(document).ready(function(){
					
		
		// calendar
		jQuery('#calendar').datepicker();


});
</script>

	<script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
    <script type='text/javascript'>
  var editor = CKEDITOR.replace('anekaweb');   
  </script>
	
    <script type="text/javascript">
	UPLOADCARE_PUBLIC_KEY = 'e23e39531f112c7ea919';
    CKEDITOR.replace('anekaweb', {
    extraPlugins: 'uploadcare',
    toolbar: [
        ['Uploadcare', 'Image'], ['Source', 'About']
    ],
    uploadcare: {
        multiple: true
    }
    }); </script>
    
	<script>         
	CKEDITOR.replace( 'anekaweb', {
	extraPlugins: 'image2', height: 450} );        	
    </script>
 
  </body></html>



  <?php
  }
  ?>
