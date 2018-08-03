
  <?php
  echo "
  <div id='content' class='clearfix'>
  <div class='page-title'>Lupa Password</div>
  <div class='page-container clearfix'>";      
   
 
   
      if($_SERVER['REQUEST_METHOD']=='POST'){
      // Cek email kustomer di database
      $cek_email=mysql_num_rows(mysql_query("SELECT email FROM pendaftaran WHERE email='$_POST[email]'"));
      // Kalau email tidak ditemukan
      if ($cek_email == 0){
echo "<h3>Permintaan Password Baru</h3>
	  <h5>Email $_POST[email] tidak terdaftar pada database kami.</h5>
	  <h4>Silahkan mendaftarkan akun baru.</h4>
  <a href='pendaftaran.html'><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";
  
  }
      else{
      $password_baru = substr(md5(uniqid(rand(),1)),3,10);
    
      // ganti password kustomer dengan password yang baru (reset password)
      $query=mysql_query("update pendaftaran set password=md5('$password_baru') where email='$_POST[email]'");
    
      // dapatkan email_pengelola dari database
      $anekaweb=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
     
      $kepada="$_POST[email]";
      $subject = ".:: Password Baru $anekaweb[email] ::.";
      $pesan="Password Anda yang baru adalah <b>$password_baru</b>";
      // Kirim email dalam format HTML
      $dari = "From: $anekaweb[nama_website] <".$anekaweb[email].">\n" . 
      $dari .= "Content-type: text/html\r\n";


include "library/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->Host = 'anekaweb.com'; //hostname masing-masing provider email 
$mail->SMTPDebug = 1;
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = 'info@anekaweb.com'; //user email 
$mail->Password = '1nf02016W3b'; //password email 
$mail->SetFrom('info@anekaweb.com', $iden[nama_website]); //set email pengirim
$mail->Subject = $subject; //subyek email 
$mail->AddAddress($kepada, ' '); //tujuan email
$mail->MsgHTML($pesan);
$mail->Send();
echo "<h3>Permintaan Password Baru</h3>
	  <h5>Password telah dikirim ke email $_POST[email]</h5>
	  <h4>Silahkan cek email Anda. Selanjutnya Anda dapat login menggunakan password baru.</h4>";
	  }
    }
  ?>
</div>
  </div>		
  
  <!--========= SIDEBAR ========================-->
  <?php include "$f[folder]/modul/sidebar/sidebar_home.php";?>
  <!--========= AKHIR SIDEBAR =================-->	