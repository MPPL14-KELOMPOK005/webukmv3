	 <head>
<title>FOMULIR BIODATA SISWA MYSCHOOL</title>
<style>
/* Table 1 Style */
table[border="1"] {
	  border-collapse:collapse;
	  font:normal 11px Verdana,Arial,Sans-Serif;
         color:#333;
 	border:1px solid #E8EAEE;
	text-align:left
	
}

table[border="1"] tr {
}

table[border="1"] th, table[border="1"] td {
	  vertical-align:top;
	  padding:5px 10px;
	  border:2px solid #fff;
	  vertical-align:middle
}

table[border="1"] tr:nth-child(even) {x
}

table[border="1"] th {
	  color:#fff;
	  font-weight:bold;
}
.page-title {
	font-size: 14px;
	color: #000;
	position: relative;
	font-family: Arial, Sans-Serif;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	font-weight: bold;
}
.page-title1 {
	font-size: 17px;
	color: #333;
	position: relative;
	font-family:Verdana,Arial,Sans-Serif;
	padding-right: 10px;
	padding-left:15px;
}
</style>
</head>
     <body onLoad="window.print()">
      <?php
  include "../config/koneksi.php";
  include "../config/library.php";
  include "../config/fungsi_indotgl.php";
echo" <div id='content' class='clearfix'>
      <div class='page-container clearfix'>";
	  
      $tampil=mysql_query("SELECT * FROM pendaftaran where no_daftar='$_GET[no_daftar]'");
  $r=mysql_fetch_array($tampil);
	  $tgl_lahir = tgl_indo($r[tgl_lahir]);
	  
   $logo=mysql_fetch_array(mysql_query("SELECT * FROM logo"));
echo" <table style='width: 100%;' border='1'>
    <tr>
        <td id='kepala' width='100%' align='center'>
           <table width='100%' border='0'>
            <tr>
                <td align='center'>
                    <font size='4'><b>Pemerintah Kelurahan Pancoran<br>Dinas Pendidikan</b></font><br>
					<img src='../img_anekaweb/logo/$logo[gambar]' width='220'><br>
                    <font size='3'>Bidang Keahlian: Teknologi dan Rekayasa, Teknologi Informasi dan Komunikasi, Bisnis dan Manajemen</font><br>
                    <font size='2'>Jl. Kalibata Selatan 1b No. 36, Telp. 085694871343 Web: www.anekaweb.com/myschoolv3</font>
                </td>
            </tr>
           </table>
        </td>
    </tr>
    <tr>
        <td>
            <hr style='border: double'>
        </td>
    </tr>
</table><table style='width: 100%;' border='1'>
<tr>
  <td colspan='4'><div align='center'><div class='page-title1'>FORMULIR PENDAFTARAN SISWA BARU MYSCHOOL</div></div></td>
</tr>
<tr>
  <td colspan='4'> <div class='page-title'>PROFIL DATA ANDA</div></td>
  </tr>
  <tr><td width='170' height='23'><b>No. Pendaftaran</b></td><td width=7> : </td><td width='580'>$r[no_daftar]</td>";
    if ($r[gambar]!=''){
echo "<td width='200' rowspan='16'><div align='center'><img src='../img_anekaweb/profil/$r[gambar]' width='200' /></div></td>";
      }
	  else{
echo "<td width='200' rowspan='16'><div align='center'><img src='../img_anekaweb/profil/no-image.jpg' width='200'/> </div></td>";
      }
echo "</tr>
		<tr><td><b>Nama Lengkap</b></td>			<td> : </td><td>$r[nama_siswa]</td>
	    </tr>    
		<tr><td><b>NISN</b></td>			<td> : </td><td>$r[nisn]</td>
	    </tr>  
		<tr><td><b>Tempat / Tgl. Lahir</b></td>				<td> : </td><td>$r[tempat_lahir], $tgl_lahir</td>
	    </tr>
		<tr><td><b>Jenis Kelamin</b></td>			        <td> : </td><td>$r[jenis_kelamin]</td>
	    </tr>
		<tr><td><b>Golongan Darah</b></td>			        <td> : </td><td>$r[gol_drh]</td>
	    </tr>
		<tr><td><b>Berat / Tinggi</b></td>			        <td> : </td><td>$r[berat]kg, $r[tinggi]cm</td>
	    </tr>
		<tr><td><b>Alamat Lengkap</b></td>			        <td> : </td><td>$r[alamat] $r[kodepos]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td>$r[agama]</td>
	    </tr>
		<tr><td><b>Asal Sekolah</b></td>			        <td> : </td><td>$r[sekolah]</td>
	    </tr>
		<tr><td><b>Alamat Sekolah</b></td>			        <td> : </td><td>$r[alamat_sekolah]</td>
	    </tr>
		<tr><td><b>Tahun Lulus</b></td>			        <td> : </td><td>$r[tahun_lulus]</td>
	    </tr>
		<tr><td><b>No. Ijazah</b></td>			        <td> : </td><td>$r[ijazah]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			        <td> : </td><td>$r[telp]</td>
	    </tr>
		<tr><td><b>Email</b></td>			        <td> : </td><td>$r[email]</td>
	    </tr>
		<tr><td><b>Pilihan Jurusan</b></td>			        <td> : </td><td>$r[jurusan1] / $r[jurusan2]</td>
	    </tr>
		<tr><td><b>Nilai UN</b></td>			        <td> : </td><td>Matematika: $r[mtk], B. Inggris: $r[bin], Biologi: $r[big], IPA: $r[ipa]</td>
	    </tr>
		
		<tr><td colspan='4'> <div class='page-title'>PROFIL DATA ORANG TUA</div></td></tr>
		<tr><td><b>Nama Ayah</b></td>			    <td> : </td><td colspan='2'>$r[nama_ayah]</td>
	    </tr>
		<tr><td><b>Nama Ibu</b></td>			    <td> : </td><td colspan='2'>$r[nama_ibu]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			    <td> : </td><td colspan='2'>$r[telp_ortu]</td>
	    </tr>
		<tr><td><b>Pekerjaan Ayah</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_ayah]</td>
	    </tr>
		<tr><td><b>Pekerjaan Ibu</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_ibu]</td>
	    </tr>
		<tr><td><b>Alamat</b></td>			        <td> : </td><td colspan='2'>$r[alamat_ortu]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td colspan='2'>$r[agama_ortu]</td>
	    </tr>
		
		<tr><td colspan='4'> <div class='page-title'>PROFIL DATA WALI</div></td></tr>
		<tr><td><b>Nama Wali</b></td>			    <td> : </td><td colspan='2'>$r[nama_wali]</td>
	    </tr>
		<tr><td><b>No. Telp/Hp</b></td>			    <td> : </td><td colspan='2'>$r[telp_wali]</td>
	    </tr>
		<tr><td><b>Pekerjaan Wali</b></td>			<td> : </td><td colspan='2'>$r[pekerjaan_wali]</td>
	    </tr>
		<tr><td><b>Alamat</b></td>			        <td> : </td><td colspan='2'>$r[alamat_wali]</td>
	    </tr>
		<tr><td><b>Agama</b></td>			        <td> : </td><td colspan='2'>$r[agama_wali]</td>
	    </tr>";
echo "</table>
			
	  </div>
	  </div>";
?>
     