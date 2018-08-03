<?php
$sql2 = mysql_query("select twitter from identitas LIMIT 1");
$j2   = mysql_fetch_array($sql2);
echo "$j2[twitter]"; 
?>
