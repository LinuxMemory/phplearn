<?php

$db_host = "localhost";
$db_user = "cmsuser";
$db_pass = "Hsra35@5";
$db_name = "cms";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$sql = "CREATE TABLE MyGuests123 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

mysqli_query($conn, $sql);

?>