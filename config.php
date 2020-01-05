
<?php
define('DB_SEVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ithelpdeskdb');

$link = mysqli_connect(DB_SEVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link == false){
	die("ERROR: Could not connect." .mysqli_connect_error());
}
?>