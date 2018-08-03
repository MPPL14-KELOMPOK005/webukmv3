  <div id="content" class="clearfix">
  <div class="page-title">Hubungi Kami</div>
  <div class="page-container clearfix">
				
  
  <?php	
  $anekaweb=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

  echo "
 
  <h4>Alamat $anekaweb[nama_website]</h4>
  <div class='alamat'>$anekaweb[alamat]</div>
  <div class='alamat'>Email: $anekaweb[email]</div>
  <div class='alamat'>Telp: $anekaweb[tlp]</div>
  ";
 
  echo "
  <br/> <br/>
  <div class='page-title'>Peta Lokasi</div>";
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
      $peta= mysql_query("SELECT * FROM identitas");
	  $p = mysql_fetch_array($peta);
	  $pecahd = explode(",", $p[peta]);
	  $width = $pecahd[0];
	  $height = $pecahd[1];
	  $longtitude = $pecahd[2];
	  $latitude = $pecahd[3];
	  
echo "<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;$height$width'><div id='gmap_canvas' style='$height$width'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://mapswebsite.net/'>google map embed</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9dacf49d856d48ac05328452029624720cb6df64'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:18,center:new google.maps.LatLng($longtitude,$latitude),mapTypeId: google.maps.MapTypeId.TERRAIN};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng($longtitude,$latitude)});infowindow = new google.maps.InfoWindow({content:'<strong>$iden[nama_website]</strong><br>$iden[alamat]<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script><br/>
  <br/><br/>
				
				
  <div id='reply' class='clearfix'>
  <div class='page-title'>Tulis Pesan</div>
  <div class='contact-form'>  <form method='post' action='$aneka_web/hubungi-aksi.html' class='commentForm'>
  <input type=hidden name=id value=$d[id_hubungi]>
  
  <input required type='text' name='nama'  placeholder='Nama'>
  <input required type='text' name='email' placeholder='E-mail'>
  <input required type='text' name='subjek' placeholder='Subjek'>
  <textarea required name='pesan' placeholder='Pesan Anda'></textarea>
  <div>
  <div class='anekawebcaptcha'><img src='$aneka_web/captcha/captcha.php?rand=<?php echo rand(); ?>' id='captchaimg' ></div>
  <div class='anekawebcaptcha'> Masukan 6 kode diatas :</div>
  <input required type='text' name='kode' placeholder='Kode' size='6' maxlength='6'/>
  <div class='anekawebcaptcha'>huruf tidak ke baca? klik <a href='javascript: refreshCaptcha();'>disini</a> refresh</div>
  </div>
  
  <input type='submit' value='Kirim Pesan'>
  </form>
  </div></div></div>";
  ?>	
  </div>

  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>