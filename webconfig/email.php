<?php
$sql2 = mysql_query("select email from identitas LIMIT 1");
$j2   = mysql_fetch_array($sql2);
echo "$j2[email]"; 
?>
