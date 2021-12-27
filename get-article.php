<?php

require "includes/database.php";
require "includes/get-article.php";

$conn = getDB();

$articles = getArticle($conn, $_GET['id']);

if ($articles === null) {
	echo "article not found";

}




?>