<?php
$db_host = "localhost";
$db_user = "cmsuser";
$db_pass = "Hsra35@5";
$db_name = "cms";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	echo mysqli_connect_error();
} 

?>