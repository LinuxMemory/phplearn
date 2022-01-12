<?php

require "includes/database.php";
require "includes/get-article.php";
require "includes/validate-erros.php";
require "includes/redirect-url.php";


$conn = getDB();

$articles = getArticle($conn, $_GET['id']);

$id = $articles['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$sql = "DELETE from articles where id = ?";

$stmt = mysqli_prepare($conn,$sql);

if ($stmt === false) {
	exit("wrong stmt");
} else {

mysqli_stmt_bind_param($stmt, "i", $id);
	
mysqli_execute($stmt);

redirectURL("/index.php");

}
}


?>

<!DOCTYPE html>
<html>
<body>
	<form method="post" >
		
		<h3>Are you sure want remove the article?</h3>
		<button>Yes</button>
		
		
		<a href="article.php?id=<?php echo $id ?>">Cancel</a>
	
	</form>
	
	
</body>
</html>