 <?php
$iden=mysql_fetch_array(mysql_query("SELECT url FROM identitas"));
  echo"<a class='dropdown-toggle' href='$iden[url]' target='_blank'>
  <span class='iconsweets-globe iconsweets-white'></span>
  </a> ";
?>