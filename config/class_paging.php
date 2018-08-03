<?php

// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1><< First</a> | 
                    <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next>Next ></a> | 
                     <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// class paging untuk halaman agenda
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halagenda'])){
	$posisi=0;
	$_GET['halagenda']=1;
}
else{
	$posisi = ($_GET['halagenda']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='http://localhost/myschool/agenda/hal/1'><</a></li>";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/agenda/hal/$i'>$i</a></li>";
  }
	  $angka .= "<li><a href='#'>$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/agenda/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><a href=''> ... </a></li>
	                                     <li> <a href='http://localhost/myschool/agenda/hal/$jmlhalaman'>$jmlhalaman</a></li>  " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li>
	                   <a href='http://localhost/myschool/agenda/hal/$next'>></a></li>";
}
else{
	$link_halaman .= "<li><a href=''>></a></li>";
}
return $link_halaman;
}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// class paging untuk halaman kategori
class Paging3{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halkategoriberita'])){
	$posisi=0;
	$_GET['halkategoriberita']=1;
}
else{
	$posisi = ($_GET['halkategoriberita']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='http://localhost/myschool/halkategoriberita/$_GET[cat]/1'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ...</a></li> " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/halkategoriberita/$_GET[cat]/$i'>$i</a></li> ";
  }
	  $angka .= " <li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/halkategoriberita/$_GET[cat]/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><a href=''>...</a></li>
	                                             <li><a href='http://localhost/myschool/halkategoriberita/$_GET[cat]/$jmlhalaman'>$jmlhalaman</a></li>  " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href='http://localhost/myschool/halkategoriberita/$_GET[cat]/$next'>></a> </li>  ";
}
else{
	$link_halaman .= " <li><a href=''>></a> </li>";
}
return $link_halaman;
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// class paging untuk halaman download 
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haldownload'])){
	$posisi=0;
	$_GET['haldownload']=1;
}
else{
	$posisi = ($_GET['haldownload']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='http://localhost/myschool/download/hal/1'><</a></li>";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/download/hal/$i'>$i</a></li>";
  }
	  $angka .= "<li><a href='#'>$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/download/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><a href='#'> ... </a></li>
	                                     <li> <a href='http://localhost/myschool/download/hal/$jmlhalaman'>$jmlhalaman</a></li>  " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li>
	                   <a href='http://localhost/myschool/download/hal/$next'>></a></li>";
}
else{
	$link_halaman .= "<li><a href=''>></a></li>";
}
return $link_halaman;
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// class paging untuk halaman Video 
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halvideo'])){
	$posisi=0;
	$_GET['halvideo']=1;
}
else{
	$posisi = ($_GET['halvideo']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='http://localhost/myschool/video/hal/1'><</a></li>";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/video/hal/$i'>$i</a></li>";
  }
	  $angka .= "<li><a href='#'>$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/video/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><a href=''> ... </a></li>
	                                     <li> <a href='http://localhost/myschool/video/hal/$jmlhalaman'>$jmlhalaman</a></li>  " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li>
	                   <a href='http://localhost/myschool/video/hal/$next'>></a></li>";
}
else{
	$link_halaman .= "<li><a href=''>></a></li>";
}
return $link_halaman;
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////
// class paging untuk halaman album  
class Paging6{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halpengumuman'])){
	$posisi=0;
	$_GET['halpengumuman']=1;
}
else{
	$posisi = ($_GET['halpengumuman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/pengumuman/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/pengumuman/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/pengumuman/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ... </a></li>
	    <li><a href='http://localhost/myschool/pengumuman/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/pengumuman/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}


//////////////////////////////////////////////////////////////////////////////////////////////////
// class paging untuk halaman album  
class Paging7{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halberita'])){
	$posisi=0;
	$_GET['halberita']=1;
}
else{
	$posisi = ($_GET['halberita']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/berita/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/berita/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/berita/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/berita/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/berita/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}


//=======================================================================

// class paging untuk Tag Berita
class Paging8{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halgalerifoto'])){
	$posisi=0;
	$_GET['halgalerifoto']=1;
}
else{
	$posisi = ($_GET['halgalerifoto']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/galeri-foto/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/galeri-foto/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/galeri-foto/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/galeri-foto/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/galeri-foto/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}

//=======================================================================

// class paging untuk Tag Berita
class Paging9{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halpengajar'])){
	$posisi=0;
	$_GET['halpengajar']=1;
}
else{
	$posisi = ($_GET['halpengajar']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/pengajar/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/pengajar/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/pengajar/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/pengajar/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/pengajar/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}
//=======================================================================

// class paging untuk Anggota
class Paging10{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haldatasiswa'])){
	$posisi=0;
	$_GET['haldatasiswa']=1;
}
else{
	$posisi = ($_GET['haldatasiswa']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/datasiswa/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/datasiswa/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/datasiswa/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/datasiswa/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/datasiswa/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}
//=======================================================================

// class paging untuk hasillulusadministrasi
class Paging11{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halhasillulusadministrasi'])){
	$posisi=0;
	$_GET['halhasillulusadministrasi']=1;
}
else{
	$posisi = ($_GET['halhasillulusadministrasi']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/hasillulusadministrasi/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/hasillulusadministrasi/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/hasillulusadministrasi/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/hasillulusadministrasi/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/hasillulusadministrasi/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}
//=======================================================================

// class paging untuk Anggota
class Paging12{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halhasilkelulusansiswa'])){
	$posisi=0;
	$_GET['halhasilkelulusansiswa']=1;
}
else{
	$posisi = ($_GET['halhasilkelulusansiswa']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= " <li><a href='http://localhost/myschool/hasilkelulusansiswa/hal/$prev'><</a></li> ";
}
else{ 
	$link_halaman .= "<li><a href=''><</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " <li><a href=''> ... </a></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='http://localhost/myschool/hasilkelulusansiswa/hal/$i'>$i</a></li> ";
  }
	  $angka .= "<li><a href=''>$halaman_aktif</a></li> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='http://localhost/myschool/hasilkelulusansiswa/hal/$i'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ...</a></li>
	    <li><a href='http://localhost/myschool/hasilkelulusansiswa/hal/$jmlhalaman'>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href='http://localhost/myschool/hasilkelulusansiswa/hal/$next'>></a></li> ";
}
else{
	$link_halaman .= " <li><a href=''>></a></li>";
}
return $link_halaman;
}
}

?>