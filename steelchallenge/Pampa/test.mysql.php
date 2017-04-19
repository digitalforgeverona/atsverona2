<?php
$output = '<pre><strong>Databases list</strong><br />';
$link = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('test', $link) or die(mysql_error());
$query = mysql_query('SHOW DATABASES', $link) or die(mysql_error());
if(mysql_num_rows($query) > 0) {
	while($r = mysql_fetch_row($query))
		$output .= $r[0].'<br />';
}
echo ''.$output.'</pre>';
mysql_close($link);
?>