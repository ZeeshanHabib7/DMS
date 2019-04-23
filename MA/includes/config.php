<?php
define('DB_SERVER','110.37.224.211');
define('DB_USER','dms');
define('DB_PASS' ,'8345unfn');
define('DB_NAME', 'DMS');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
