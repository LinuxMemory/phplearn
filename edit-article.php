<?php

require "includes/database.php";
require "includes/get-article.php";
require "includes/validate-erros.php";
require "includes/redirect-url.php";


$conn = getDB();

$articles = getArticle($conn, $_GET['id']);
$errors = validateInput($title, $content, $published_time);


$id = $articles['id'];
$title = $articles['title'];
$content = $articles['content'];
$published_time = $articles['published_time'];



if ($_SERVER['REQUEST_METHOD'] == "POST"){
$sql = "update articles set 
title = ?
where id = ?";
	
$title = $_POST['title'];
	
$stmt = mysqli_prepare($conn, $sql);	
	

mysqli_stmt_bind_param($stmt, "si", $title, $id);

	
if (mysqli_stmt_execute($stmt)){
	
redirectURL("/article.php?id=$id");
	
}


	





if ($articles === null) {
	echo "article not found";
}

}
?>

<!DOCTYPE HTML>
<html>
<body>
	<h1>My Blog</h1>
	<h3>Edit Article</h3>
	<?php foreach ($errors as $error): ?>
	<ul><li><?php echo $error; ?></li></ul>
	<?php endforeach; ?>
	
	<form method="post">
		
		<div>
			<label for="title">Article Name</label>
			<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">
		</div><br>
		
		<div>
			<label for="content">Content</label>
			<textarea name="content" id="content"><?php echo htmlspecialchars($content); ?></textarea>			
		</div><br>
 
		<div>
			<label for="published_at">Published Time</label>
			<input type="datetime" name="published_at" id="published_at" value="<?php echo htmlspecialchars($published_time); ?>">
		</div>
	    
		<br>
		<button>Save</button>
	</form>
	
</body>
</html>