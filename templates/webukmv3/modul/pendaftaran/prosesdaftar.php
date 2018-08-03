 <div id="content" class="clearfix">
  <div class="page-title">Pendaftaran</div>
  <div class="page-container clearfix">
   <?php   
 
function newID()
{
$query = "SELECT max(no_daftar) as maxID FROM pendaftaran";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 5, 5);
$noUrut++;
$no_daftar = 'UKM' . sprintf("%05s", $noUrut);
return $no_daftar;
}

$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$nim = $_POST['nim'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$pilihukm = $_POST['pilihukm'];
$kode = $_POST['kode'];
$no_daftar = $_POST['no_daftar'];

// mengenerate ID member baru
$no_daftar = newID();
$login=mysql_query("SELECT no_daftar FROM pendaftaran WHERE no_daftar='$no_daftar' OR email='$email'");
$ketemu=mysql_num_rows($login);
  
 if($ketemu!=0){ 
 echo "<h3>PENDAFTARAN ANGGOTA GAGAL!</h3>
	  <h5> Username <b>$username</b> atau email <b>$email</b> sudah terdaftar sebelumnya.</h5>
	  <h4>Silahkan mendaftarkan akun baru.</h4>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";}
  
  elseif (empty($nama_mahasiswa)){
  echo "<h3>PENDAFTARAN ANGGOTA GAGAL!</h3>
        <h5>Anda belum mengisikan NAMA MAHASISA</h5>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";}
  
  elseif (empty($nim)){
  echo "<h3>PENDAFTARAN ANGGOTA GAGAL!</h3>
        <h5>Anda belum mengisikan NIM</h5>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";}
  
		  
  elseif (empty($email)){
  echo "<h3>PENDAFTARAN ANGGOTA GAGAL!</h3>
        <h5>Anda belum mengisikan EMAIL</h5>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";}
  
  
else{
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['kode']){
 $query = "INSERT INTO pendaftaran(
								 no_daftar,
                                 nama_mahasiswa,
                                 nim,
                                 email,
								 password,
                                 pilihukm,
								 tanggal) 
                         VALUES(
								'$no_daftar',
                                '$_POST[nama_mahasiswa]',
                                '$_POST[nim]',
                                '$_POST[email]',
								md5('$_POST[pass]'),
                                '$_POST[pilihukm]',
								'$tgl_sekarang')";
    

   mysql_query($query);
echo "
  <div id='content' class='clearfix'>
  <div class='page-container clearfix'>  
<h3>PENDAFTARAN ANGGOTA BERHASIL!</h3>
<h5>Username anda adalah <b>$no_daftar</b>, gunakan untuk login!</h5>
</div>
  </div>	
  </div>
  </div>";	
include "$f[folder]/modul/sidebar/sidebar_home.php";

}else{
  echo "<br/><h5>Kode yang Anda masukkan tidak cocok !</h5>
  <a href=javascript:history.go(-1) class='button-blue'>Ulangi Lagi</a>";}
  }
  else{
  echo "<h5>Anda belum memasukkan kode</h5>
  <a href=javascript:history.go(-1)><input type='submit' 
  class='button-blue' value='Ulangi Lagi' name='submit'/></a>";}}
  ?>
</div>
  </div>		
  