<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bio_db = "localhost";
$database_bio_db = "bio_db";
$username_bio_db = "root";
$password_bio_db = "123456";
$bio_db = mysql_pconnect($hostname_bio_db, $username_bio_db, $password_bio_db) or trigger_error(mysql_error(),E_USER_ERROR); 
?>