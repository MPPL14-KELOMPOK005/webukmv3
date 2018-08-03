 <?php
$a=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));
echo "<img width=55 height=55 src='../img_anekaweb/user/$a[foto]'>"; 
?>