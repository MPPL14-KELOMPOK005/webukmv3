  <div id="content" class="clearfix">
  <div class="page-title">Formulir Pendaftaran <?php echo "$iden[nama_website]"; ?> Online</div>
  <div class="page-container clearfix">
				
				
  <div id="reply" class="clearfix">
  <div class="contact-form">  
  
  <form method="post" action="<?php echo "$aneka_web/"; ?>proses-daftar.html" class="commentForm">
  <table style='width: 100%;' border='1'>
  <tr>
    <td colspan="2">
  <div class="page-title">PENDAFTARAN</div></td>
  </tr> 
  <tr>
    <td>Nama </td>
    <td><input required type="text" name="nama_mahasiswa"  placeholder="Nama Mahasiswa"> </td>
  </tr> 
  <tr>
    <td>NIM</td>
    <td><input required type="text" name="nim"  placeholder="NIM"> </td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"  placeholder="Email"> </td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input required type="Password" name="pass"  placeholder="Password"> </td>
  </tr>
   
   <tr>
    <td>Pilih UKM</td>
    <td><select name='pilihukm'>
        <option value=''>Pilihan UKM</option>
        <option value='UKM Volly'>UKM Volly</option>
        <option value='Tarung Derajat'>Tarung Derajat</option>
        <option value='Pancaksilat'>Pancaksilat</option>
        <option value='Sepakbola'>Sepakbola</option>
        <option value='Sadaya'>Sadaya</option>
		<option value='Teknik Elektronika Industri'>Youth English Society</option>

    </select>
	</td>
  </tr>
   <tr>
    <td>Kode</td>
    <td>
  
  <div class="anekawebcaptcha"><img src="<?php echo "$aneka_web/"; ?>captcha/captcha.php?rand=<?php echo rand(); ?>" id="captchaimg" ></div>
  <div class="anekawebcaptcha"> Masukan 6 kode diatas :</div>
  <div class="anekawebcaptcha"><input required type="text" name="kode" placeholder="Kode" size="6" maxlength="6"/></div>
  <div class="anekawebcaptcha">huruf tidak ke baca? klik <a href="javascript: refreshCaptcha();">disini</a> refresh</div>
  </td>
  </tr>
  <tr>
    <td></td>
    <td>
  
  <input type="submit" value="DAFTAR">
   </td>
 
  </tr>
</table>
  
  </form>
  </div></div></div>
  </div>

  <?php include "$f[folder]/modul/sidebar/sidebar_home.php";?>