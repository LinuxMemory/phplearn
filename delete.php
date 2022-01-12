<?php

require "includes/database.php";
require "includes/get-article.php";
require "includes/validate-erros.php";
require "includes/redirect-url.php";


$conn = getDB();

$articles = getArticle($conn, $_GET['id']);

$id = $articles['id'];

$sql = "DELETE from articles where id = ?";

$stmt = mysqli_prepare($conn,$sql);

if ($stmt === false) {
	exit("wrong stmt");
} else {

mysqli_stmt_bind_param($stmt, "i", $id);
	
mysqli_execute($stmt);


}



?>