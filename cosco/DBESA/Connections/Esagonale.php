<?php

# FileName="Connection_php_mysql.htm"

# Type="MYSQL"

# HTTP="true"

$hostname_Esagonale = "localhost";

$database_Esagonale = "atsveron_dbesa";

$username_Esagonale = "atsveron_dbesa";

$password_Esagonale = "Jump02052012";

$Esagonale = mysql_pconnect($hostname_Esagonale, $username_Esagonale, $password_Esagonale) or trigger_error(mysql_error(),E_USER_ERROR); 

?>