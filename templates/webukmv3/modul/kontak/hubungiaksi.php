
  <!--========= HEADER ===================================-->
  <?php include "$f[folder]/header-detail.php";?>
  <!--========= AKHIR  HEADER  =================================-->


  <?php
  echo "
  <div id='content' class='clearfix'>
  <div class='page-title'>Hubungi Kami</div>
  <div class='page-container clearfix'>";          
  
  $nama=trim($_POST[nama]);
  $email=trim($_POST[email]);
  $subjek=trim($_POST[subjek]);
  $pesan=trim($_POST[pesan]);
  
  $anekaweb=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

  if (empty($nama)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan NAMA</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
		  
  elseif (empty($email)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan EMAIL</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
		  

  elseif (empty($subjek)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan SUBJEK</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
  
  elseif (empty($pesan)){
  echo "<span class='new-comment-heading'>Anda belum mengisikan PESAN</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}
  
  else{
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['kode']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
  echo "<br/>
  <h3>Terima Kasih</h3>
  <h5>Anda telah menghubungi $anekaweb[nama_website], kami segera merespon pesan anda.</h5>";
   
   
   $kepada = "$anekaweb[email]"; 
   $judul = "Ada Pesan di $anekaweb[nama_website]";
   $pesan = "Baru saja ada yang kirim pesan di $anekaweb[nama_website]\n"; 
   $pesan .= "Cek Administrator: $anekaweb[url]/editweb"; 
   mail($kepada,$judul,$pesan,"From: $anekaweb[email]\n Content-type:text/html\r\n"); }
  
  else{
  echo "<br/><h5>Kode yang Anda masukkan tidak cocok !</h5>
  <a href=javascript:history.go(-1) class='button-blue'>Ulangi Lagi</a>";}}
  
  else{
  echo "<span class='new-comment-heading'>Anda belum memasukkan kode</span>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='contact-form-button' value='Ulangi Lagi' name='submit'/></a>";}}
    
  echo "
  </div>"; 
  ?>

  </div>		
  
  <!--========= SIDEBAR ========================-->
  <?php include "$f[folder]/modul/sidebar/sidebar_detail.php";?>
  <!--========= AKHIR SIDEBAR =================-->			