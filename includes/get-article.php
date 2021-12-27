<?php

function getArticle($conn, $id) {

$sql = "select * from articles where id = ?";
	
$stmt = mysqli_prepare($conn, $sql);

if ($stmt ===false){
	echo mysqli_error();
} else {
	
mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_execute($stmt);
	
$result = mysqli_stmt_get_result($stmt);

return mysqli_fetch_array($result, MYSQLI_ASSOC);

	}

}




?>